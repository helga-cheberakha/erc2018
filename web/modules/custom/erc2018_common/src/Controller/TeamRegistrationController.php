<?php
/**
 * @file
 * Contains \Drupal\erc2018_common\Controller\TeamRegistrationController.
 */

namespace Drupal\erc2018_common\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Entity\User;

/**
 * Provides a controller for team register form.
 */
class TeamRegistrationController extends ControllerBase {

  public function teamRegister() {
    $build = [];

    $entity = User::create();
    $formObject = \Drupal::entityManager()
      ->getFormObject('user', 'erc2018_common_team_register')
      ->setEntity($entity);

    $build['form'] = \Drupal::formBuilder()->getForm($formObject);
    return $build;
  }

}

