<?php

namespace Drupal\ajax_popup\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;

/**
 * Provides Ajax Controller.
 */
class AjaxController extends ControllerBase {

  public function index(NodeInterface $node) {
    $query = \Drupal::database()->select('node_field_data', 'nfd');
    $query->fields('nfd', ['nid', 'title']);
    $query->condition('nfd.type', 'article');
    $count_node = $query->countQuery()->execute()->fetchField();
    $render = [
      '#theme' => 'ajax_popup',
      '#count_node' => $count_node,
      '#type' => 'inline_template',
    ];
    return $render;
  }
}
