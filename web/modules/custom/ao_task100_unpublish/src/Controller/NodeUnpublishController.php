<?php

namespace Drupal\ao_task100_unpublish\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;

/**
 * Provides Ajax Controller.
 */
class NodeUnpublishController extends ControllerBase {

  public function content(NodeInterface $node) {
    $render = [
      '#type' => 'inline_template',
      '#template' => [
        $node->id(),
        $node->setPublished(false),
        $node->save()
        ]
    ];
    return $render;
  }
}
