<?php

namespace Drupal\webform_views\Plugin\views\field;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\ResultRow;
use Drupal\webform_views\Plugin\views\field\WebformSubmissionField;

/**
 * Webform submission text format field.
 *
 * @ViewsField("webform_submission_text_format_field")
 */
class WebformSubmissionTextFormatField extends WebformSubmissionField {

  /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();

    $options['webform_element_property'] = ['default' => 'value'];

    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    $form['webform_element_property'] = [
      '#type' => 'select',
      '#title' => $this->t('Property'),
      '#description' => $this->t('Select the property name.'),
      '#options' => [
        'value' => $this->t('Value'),
        'format' => $this->t('Format'),
       ],
      '#default_value' => $this->options['webform_element_property'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function query() {
    parent::query();

    $this->query->getTableInfo($this->tableAlias)['join']->extra[] = [
      'field' => 'property',
      'value' => $this->options['webform_element_property'],
    ];

  }

  /**
   * {@inheritdoc}
   */
  public function render(ResultRow $values) {
    /** @var \Drupal\webform\WebformSubmissionInterface $webform_submission */
    $webform_submission = $this->getEntity($values);

    if ($webform_submission && $webform_submission->access('view')) {
      $webform = $webform_submission->getWebform();

      // Get format and element key.
      $format = $this->options['webform_element_format'];      
      $element_key = $this->definition['webform_submission_field'];

      // Get element and element handler plugin.
      $element = $webform->getElement($element_key,TRUE);
      
      if (!$element) {
        return [];
      }

      // Set the format.
      $element['#format'] = $format;

      // Get element handler and get the element's HTML render array.
      $element_handler = $this->webformElementManager->getElementInstance($element);

      $options = [];
      if (!$this->options['webform_multiple_value']) {
        $options['delta'] = $this->options['webform_multiple_delta'];
      }

      if ($this->options['webform_element_property'] === 'format') {
        return $element_handler->getValue($element, $webform_submission, $options)['format'];
      } 

      return $element_handler->formatHtml($element, $webform_submission, $options);
    }

    return [];
  }


}
