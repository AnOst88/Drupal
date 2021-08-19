<?php

namespace Drupal\ao_task29_node_tpl\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Block output depending on url parameter.
 */
class NodeTplController extends ControllerBase {

  /**
   * Get and show block depending on url parameter.
   */
  public function NodeTpl() {
    return [
      '#type' => 'item',
      '#markup' => t('Task 29')
    ];
  }
}
