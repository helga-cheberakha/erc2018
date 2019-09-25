<?php

namespace Drupal\views_data_export\Plugin\views\display;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Cache\CacheableResponse;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\BubbleableMetadata;
use Drupal\rest\Plugin\views\display\RestExport;
use Drupal\views\ViewExecutable;
use Drupal\views\Views;

/**
 * Provides a data export display plugin.
 *
 * This overrides the REST Export display to make labeling clearer on the admin
 * UI, and to allow attaching of these to other displays.
 *
 * @ingroup views_display_plugins
 *
 * @ViewsDisplay(
 *   id = "data_export",
 *   title = @Translation("Data export"),
 *   help = @Translation("Export the view results to a file. Can handle very large result sets."),
 *   uses_route = TRUE,
 *   admin = @Translation("Data export"),
 *   returns_response = TRUE
 * )
 */
class DataExport extends RestExport {

  /**
   * {@inheritdoc}
   */
  public static function buildResponse($view_id, $display_id, array $args = []) {
    // Load the View we're working with and set its display ID so we can get
    // the exposed input.
    $view = Views::getView($view_id);
    $view->setDisplay($display_id);
    $view->setArguments($args);

    // Build different responses whether batch or standard method is used.
    if ($view->display_handler->getOption('export_method') == 'batch') {
      return static::buildBatch($view, $args);
    }

    return static::buildStandard($view);
  }

  /**
   * Builds batch export response.
   *
   * @param \Drupal\views\ViewExecutable $view
   *    The view to export.
   *
   * @return null|\Symfony\Component\HttpFoundation\RedirectResponse
   *    Redirect to the batching page.
   */
  protected static function buildBatch(ViewExecutable $view, $args) {
    // Get total number of items.
    $view->get_total_rows = TRUE;
    $export_limit = $view->getDisplay()->getOption('export_limit');

    $view->preExecute($args);
    $view->build();
    $count_query = clone $view->query;
    $count_query_results = $count_query->query(true)->execute();


    if ($count_query_results instanceof \Drupal\search_api\Query\ResultSetInterface) {
      $total_rows = $count_query_results->getResultCount();
    }
    else {
      $count_query_results->allowRowCount = TRUE;
      $total_rows = $count_query_results->rowCount();
    }

    // Don't load and instantiate so many entities.
    $view->query->setLimit(1);
    $view->execute();

    // If export limit is set and the number of rows is greater than the
    // limit, then set the total to limit.
    if ($export_limit && $export_limit < $total_rows) {
      $total_rows = $export_limit;
    }

    $batch_definition = [
      'operations' => [
        [
          [static::class, 'processBatch'],
          [
            $view->id(),
            $view->current_display,
            $view->args,
            $view->getExposedInput(),
            $total_rows,
          ],
        ],
      ],
      'title' => t('Exporting data...'),
      'progressive' => TRUE,
      'progress_message' => t('@percentage% complete. Time elapsed: @elapsed'),
      'finished' => [static::class, 'finishBatch'],
    ];
    batch_set($batch_definition);

    // The redirect destination is usually set with a destination, fall back
    // to option redirect path, if empty redirect to front.
    $redirect_path = $view->display_handler->getOption('redirect_path');
    if (empty($redirect_path)) {
      return batch_process(Url::fromRoute('<front>'));
    }
    else {
      return batch_process(Url::fromUserInput(trim($redirect_path)));
    }

  }

  /**
   * Builds standard export response.
   *
   * @param \Drupal\views\ViewExecutable $view
   *    The view to export.
   *
   * @return \Drupal\Core\Cache\CacheableResponse
   *    Redirect to the batching page.
   */
  protected static function buildStandard(ViewExecutable $view) {
    $build = $view->buildRenderable();

    // Setup an empty response so headers can be added as needed during views
    // rendering and processing.
    $response = new CacheableResponse('', 200);
    $build['#response'] = $response;

    /** @var \Drupal\Core\Render\RendererInterface $renderer */
    $renderer = \Drupal::service('renderer');

    $output = (string) $renderer->renderRoot($build);

    $response->setContent($output);
    $cache_metadata = CacheableMetadata::createFromRenderArray($build);
    $response->addCacheableDependency($cache_metadata);

    // Set filename if such exists.
    $view = Views::getView($view_id);
    $view->setDisplay($display_id);
    if ($filename = $view->getDisplay()->getOption('filename')) {
      $bubbleable_metadata = BubbleableMetadata::createFromObject($cache_metadata);
      $response->headers->set('Content-Disposition', 'attachment; filename="' . \Drupal::token()->replace($filename, ['view' => $view], [], $bubbleable_metadata) . '"');
    }
    $response->headers->set('Content-type', $build['#content_type']);

    return $response;
  }

  /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();

    $options['displays'] = ['default' => []];

    // Set the default style plugin, and default to fields.
    $options['style']['contains']['type']['default'] = 'data_export';
    $options['row']['contains']['type']['default'] = 'data_field';

    // We don't want to use pager as it doesn't make any sense. But it cannot
    // just be removed from a view as it is core functionality. These values
    // will be controlled by custom configuration.
    $options['pager']['contains'] = [
      'type' => ['default' => 'none'],
      'options' => ['default' => ['offset' => 0]],
    ];

    $options['export_method'] = ['default' => 'standard'];
    $options['export_batch_size'] = ['default' => '1000'];
    $options['export_limit'] = ['default' => '0'];

    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function optionsSummary(&$categories, &$options) {
    parent::optionsSummary($categories, $options);

    // Doesn't make sense to have a pager for data export so remove it.
    unset($categories["pager"]);

    // Add a view configuration category for data export settings in the
    // second column.
    $categories['export_settings'] = [
      'title' => $this->t('Export settings'),
      'column' => 'second',
      'build' => [
        '#weight' => 50,
      ],
    ];

    $options['export_method'] = [
      'category' => 'export_settings',
      'title' => $this->t('Method'),
      'desc' => $this->t('Change the way rows are processed.'),
    ];

    switch ($this->getOption('export_method')) {
      case 'standard':
        $options['export_method']['value'] = $this->t('Standard');
        break;

      case 'batch':
        $options['export_method']['value'] =
          $this->t('Batch (size: @size)', ['@size' => $this->getOption('export_batch_size')]);
        break;
    }

    $options['export_limit'] = [
      'category' => 'export_settings',
      'title' => $this->t('Limit'),
      'desc' => $this->t('The maximum amount of rows to export.'),
    ];

    $limit = $this->getOption('export_limit');
    if ($limit) {
      $options['export_limit']['value'] = $this->t('@nr rows', ['@nr' => $limit]);
    }
    else {
      $options['export_limit']['value'] = $this->t('no limit');
    }

    $displays = array_filter($this->getOption('displays'));
    if (count($displays) > 1) {
      $attach_to = $this->t('Multiple displays');
    }
    elseif (count($displays) == 1) {
      $display = array_shift($displays);
      $displays = $this->view->storage->get('display');
      if (!empty($displays[$display])) {
        $attach_to = $displays[$display]['display_title'];
      }
    }

    if (!isset($attach_to)) {
      $attach_to = $this->t('None');
    }

    $options['displays'] = array(
      'category' => 'path',
      'title' => $this->t('Attach to'),
      'value' => $attach_to,
    );

    // Add filename to the summary if set.
    if ($this->getOption('filename')) {
      $options['path']['value'] .= $this->t(' (@filename)', ['@filename' => $this->getOption('filename')]);
    }

    // Display the selected format from the style plugin if available.
    $style_options = $this->getOption('style')['options'];
    if (!empty($style_options['formats'])) {
      $options['style']['value'] .= $this->t(' (@export_format)', ['@export_format' => reset($style_options['formats'])]);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    // Remove the 'serializer' option to avoid confusion.
    switch ($form_state->get('section')) {
      case 'style':
        unset($form['style']['type']['#options']['serializer']);
        break;

      case 'export_method':
        $form['export_method'] = [
          '#type' => 'radios',
          '#title' => $this->t('Export method'),
          '#default_value' => $this->options['export_method'],
          '#options' => [
            'standard' => $this->t('Standard'),
            'batch' => $this->t('Batch'),
          ],
          '#required' => TRUE,
        ];

        $form['export_method']['standard']['#description'] = $this->t('Exports under one request. Best fit for small exports.');
        $form['export_method']['batch']['#description'] = $this->t('Exports data in sequences. Should be used when large amount of data is exported (> 2000 rows).');

        $form['export_batch_size'] = [
          '#type' => 'number',
          '#title' => $this->t('Batch size'),
          '#description' => $this->t("The number of rows to process under a request."),
          '#default_value' => $this->options['export_batch_size'],
          '#required' => TRUE,
          '#states' => [
            'visible' => [':input[name=export_method]' => ['value' => 'batch']],
          ],
        ];

        break;

      case 'export_limit':
        $form['export_limit'] = [
          '#type' => 'number',
          '#title' => $this->t('Limit'),
          '#description' => $this->t("The maximum amount of rows to export. 0 means unlimited."),
          '#default_value' => $this->options['export_limit'],
          '#min' => 0,
          '#required' => TRUE,
        ];

        break;

      case 'path':
        $form['filename'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Filename'),
          '#default_value' => $this->getOption('filename'),
          '#description' => $this->t('The filename that will be suggested to the browser for downloading purposes. You may include replacement patterns from the list below.'),
        ];

        $form['automatic_download'] = [
          '#type' => 'checkbox',
          '#title' => $this->t("Download instantly"),
          '#description' => $this->t("Check this if you want to download the file instantly after being created. Otherwise you will be redirected to above Redirect path containing the download link."),
          '#default_value' => $this->options['automatic_download'],
        ];

        $form['redirect_path'] = [
         '#type' => 'textfield',
         '#title' => $this->t('Redirect path'),
         '#default_value' => $this->options['redirect_path'],
         '#description' => $this->t('If you do not check Download instantly, you will be redirected to this path containing download link after export finished. Leave blank for <front>.'),
        ];

        // Support tokens.
        $this->globalTokenForm($form, $form_state);
        break;

      case 'displays':
        $form['#title'] .= $this->t('Attach to');
        $displays = [];
        foreach ($this->view->storage->get('display') as $display_id => $display) {
          if ($this->view->displayHandlers->has($display_id) && $this->view->displayHandlers->get($display_id)->acceptAttachments()) {
            $displays[$display_id] = $display['display_title'];
          }
        }
        $form['displays'] = [
          '#title' => $this->t('Displays'),
          '#type' => 'checkboxes',
          '#description' => $this->t('The data export icon will be available only to the selected displays.'),
          '#options' => array_map('\Drupal\Component\Utility\Html::escape', $displays),
          '#default_value' => $this->getOption('displays'),
        ];
        break;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function attachTo(ViewExecutable $clone, $display_id, array &$build) {
    $displays = $this->getOption('displays');
    if (empty($displays[$display_id])) {
      return;
    }

    // Defer to the feed style; it may put in meta information, and/or
    // attach a feed icon.
    $clone->setArguments($this->view->args);
    $clone->setDisplay($this->display['id']);
    $clone->buildTitle();
    if ($plugin = $clone->display_handler->getPlugin('style')) {
      $plugin->attachTo($build, $display_id, $clone->getUrl(), $clone->getTitle());
      foreach ($clone->feedIcons as $feed_icon) {
        $this->view->feedIcons[] = $feed_icon;
      }
    }

    // Clean up.
    $clone->destroy();
    unset($clone);
  }

  /**
   * {@inheritdoc}
   */
  public function submitOptionsForm(&$form, FormStateInterface $form_state) {
    parent::submitOptionsForm($form, $form_state);
    $section = $form_state->get('section');
    switch ($section) {
      case 'displays':
        $this->setOption($section, $form_state->getValue($section));
        break;

      case 'path':
        $this->setOption('filename', $form_state->getValue('filename'));
        break;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getAvailableGlobalTokens($prepared = FALSE, array $types = []) {
    $types += ['date'];
    return parent::getAvailableGlobalTokens($prepared, $types);
  }

}
