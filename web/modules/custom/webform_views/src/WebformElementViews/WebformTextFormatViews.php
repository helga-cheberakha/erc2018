<?php

namespace Drupal\webform_views\WebformElementViews;

use Drupal\webform\Plugin\WebformElementInterface;

/**
 * Webform views handler for text format webform elements.
 */
class WebformTextFormatViews extends WebformElementViewsAbstract {

  /**
   * {@inheritdoc}
   */
  public function getElementViewsData(WebformElementInterface $element_plugin, array $element) {
    $views_data = parent::getElementViewsData($element_plugin, $element);

    $views_data['field'] = [
      'id' => 'webform_submission_text_format_field',
      'real field' => $this->entityType->getKey('id'),
      'click sortable' => TRUE,
      'multiple' => $element_plugin->hasMultipleValues($element),
    ];

    return $views_data;
  }

}
