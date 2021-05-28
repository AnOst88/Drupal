<?php

namespace Drupal\ao_task\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for ao_task routes.
 */
class HookThemeExample extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('Task 95'),
    ];

    return $build;
  }

}
