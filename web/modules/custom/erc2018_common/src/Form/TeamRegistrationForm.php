<?php
/**
 * @file
 * Contains \Drupal\erc2018_common\Form\TeamRegistrationForm.
 */

namespace Drupal\erc2018_common\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\user\RegisterForm;

/**
 * Provides a team register form.
 */
class TeamRegistrationForm extends RegisterForm {

  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    // Customize form.
    // Hide description for email field.
    if (isset($form['account']['mail'])) {
      $form['account']['mail']['#description'] = '';
    }

    // Non-access fields.
    // Hide username field. It will be created automatically.
    $non_access = ['name', 'pass', 'status', 'roles', 'notify'];
    foreach ($non_access as $field_name) {
      if (isset($form['account'][$field_name])) {
        $form['account'][$field_name]['#access'] = FALSE;
      }
    }

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  protected function actions(array $form, FormStateInterface $form_state) {
    $element = parent::actions($form, $form_state);
    $element['submit']['#value'] = $this->t('Create new team');
    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();

    // Field "username" can't be empty.
    // Create username automatically based on team class.
    if (!$values['name']) {
      $random_number = intval(rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9));
      $username = strstr($values['mail'], '@', true) . $random_number;
      // Set up username.
      $form_state->setValue('name', $username);
    }

    // Add role "Team".
    $roles = $values['roles'];
    if (isset($roles['team'])) {
      $roles['team'] = TRUE;
    }
    $form_state->setValue('roles', $roles);

    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $account = $this->entity;

    // Save has no return value so this cannot be tested.
    // Assume save has gone through correctly.
    $account->save();

    $form_state->set('user', $account);
    $form_state->setValue('uid', $account->id());

    $this->logger('user')->notice('New user: %name %email.', ['%name' => $form_state->getValue('name'), '%email' => '<' . $form_state->getValue('mail') . '>', 'type' => $account->link($this->t('Edit'), 'edit-form')]);

    drupal_set_message($this->t('Team has been created.'));
    $form_state->setRedirect('<front>');
  }
}
