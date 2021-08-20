<?php

namespace Drupal\ao_task29_node_tpl\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Block output node from template.
 */
class NodeTplController extends ControllerBase {

  /**
   * Get and show node from template.
   */
  public function NodeTpl() {
    return [
      '#type' => 'item',
      '#markup' => t('Task 29 - Get and show node from template.')
    ];
  }
}
