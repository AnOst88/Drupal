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
    $nids = \Drupal::entityQuery('node')->condition('type','article')->execute();
    $date_formatter = \Drupal::service('date.formatter');
    foreach ($nids as $nid) {
      $data = Node::load($nid);
    }
    return [ 
      '#theme' => 'node_tpl',
      '#id' => $data->id(),
      '#label' => $data->label(),
      '#date' => $date_formatter->format(time()),
    ];
  }
}
