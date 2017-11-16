<?php

namespace Drupal\erc2018_vbo\Plugin\Action;

use Drupal\views_bulk_operations\Action\ViewsBulkOperationsActionBase;
use Drupal\views_bulk_operations\Action\ViewsBulkOperationsPreconfigurationInterface;
use Drupal\Core\Plugin\PluginFormInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Change status of the team.
 *
 * @Action(
 *   id = "team_status_change",
 *   label = @Translation("Change status of the team"),
 *   type = "profile"
 * )
 */
class TeamStatusChange extends ViewsBulkOperationsActionBase implements ViewsBulkOperationsPreconfigurationInterface, PluginFormInterface {

  /**
   * Configuration form builder.
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $options = [];

    // Gets allowed values.
    $entityManager = \Drupal::service('entity_field.manager');
    $fields = $entityManager->getFieldStorageDefinitions('profile');
    if (isset($fields['field_team_status'])) {
      $options = options_allowed_values($fields['field_team_status']);
    }

    $form['team_status'] = [
      '#title' => t('Team status'),
      '#type' => 'select',
      '#options' => $options,
      '#required' => TRUE,
    ];

    return $form;
  }

  /**
   * Submit handler for the action configuration form.
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    $this->configuration['team_status'] = $form_state->getValue('team_status');
  }

  /**
   * {@inheritdoc}
   */
  public function buildPreConfigurationForm(array $form, array $values, FormStateInterface $form_state) {
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function execute($entity = NULL) {
    if ($entity->getEntityType()->id() == 'profile' && $entity->hasField('field_team_status')) {
      // New teams status.
      if (isset($this->configuration['team_status']) && $this->configuration['team_status']) {
        // Save new status.
        $entity->set('field_team_status', $this->configuration['team_status']);
        $entity->save();
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function access($object, AccountInterface $account = NULL, $return_as_object = FALSE) {
    return TRUE;
  }

}
