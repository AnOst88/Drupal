<?php

namespace Drupal\ao_task29_node_tpl\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;

/**
 * Provides a 'TaskNodeTpl' block.
 *
 * @Block(
 *  id = "node_tpl",
 *  admin_label = @Translation("Block Node TPL"),
 * )
 */
class TaskNodeTpl extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $nids = \Drupal::entityQuery('node')->condition('type','article')->execute();

    foreach ($nids as $nid) {
      $data = Node::load($nid);
    }

    $build['node_tpl'] = [ 
      '#theme' => 'node_tpl',
      '#id' => 'This node ID - ' . $data->id(),
      '#label' => 'This node label - ' . $data->label(),
    ];
  
    return $build;
  }
}
