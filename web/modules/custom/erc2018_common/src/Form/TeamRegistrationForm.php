<?php
/**
 * @file
 * Contains \Drupal\erc2018_common\Form\TeamRegistrationForm.
 */

namespace Drupal\erc2018_common\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\user\RegisterForm;
use Drupal\profile\Entity\Profile;
use Drupal\profile\Entity\ProfileType;
use Drupal\Core\Entity\Entity\EntityFormDisplay;


/**
 * Provides a team register form.
 */
class TeamRegistrationForm extends RegisterForm {

  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    // Adds team profile form.
    $profile_type = ProfileType::load('team');
    $property = ['profiles', $profile_type->id()];
    $profile = $form_state->get($property);
    if (empty($profile)) {
      $profile = Profile::create([
        'type' => $profile_type->id(),
        'langcode' => $profile_type->language() ? $profile_type->language() : \Drupal::languageManager()->getDefaultLanguage()->getId(),
      ]);

      // Attach profile entity form.
      $form_state->set($property, $profile);
    }
    $form_state->set('form_display_' . $profile_type->id(), EntityFormDisplay::collectRenderDisplay($profile, 'default'));
    $form['entity_' . $profile_type->id()] = [
      '#type' => 'details',
      '#title' => $profile_type->label(),
      '#tree' => TRUE,
      '#parents' => ['entity_' . $profile_type->id()],
      '#open' => TRUE,
    ];

    $form_state
      ->get('form_display_' . $profile_type->id())
      ->buildForm($profile, $form['entity_' . $profile_type->id()], $form_state);

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

}
