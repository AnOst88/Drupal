<?php

namespace Drupal\ao_task29_node_tpl\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;

/**
 * Block output node from template.
 */
class NodeTplController extends ControllerBase {

  /**
   * Get and show node from template.
   */
  public function NodeTpl() {
    $query = \Drupal::entityQuery('node')
      ->condition('type', 'article')
      ->condition('status', 1);
    $nids = $query->execute();
    
    foreach ($nids as $nid) {
      $node = Node::load($nid);
    }

    return [ 
      '#theme' => 'node_tpl',
      '#node' => $node,
    ];
  }
}