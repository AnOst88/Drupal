<?php

namespace Drupal\ao_task29_node_tpl\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'TaskNodeTpl' block.
 *
 * @Block(
 *  id = "node_tpl",
 *  admin_label = @Translation("Task 29"),
 * )
 */
class TaskNodeTpl extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
     $build['node_tpl'] = [ 
     '#theme' => 'node_tpl',
     '#var' => 'HELLO',
    ];
    return $build;
  }
}
