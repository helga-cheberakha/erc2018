<?php
/**
 * @file
 * Contains \Drupal\erc2018_common\Routing\RouteSubscriber.
 */

namespace Drupal\erc2018_common\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    // Lock standard user register page.
    if ($route = $collection->get('user.register')) {
      $route->setRequirement('_access', 'FALSE');
    }
  }

}
