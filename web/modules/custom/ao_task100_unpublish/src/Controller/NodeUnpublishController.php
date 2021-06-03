<?php

namespace Drupal\ao_task100_unpublish\Controller;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\AlertCommand;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Render\Element\Ajax;
use Drupal\node\NodeInterface;

/**
 * Provides Ajax Controller.
 */
class NodeUnpublishController extends ControllerBase {

  public function content(NodeInterface $node) {
    $response = new AjaxResponse();
    $node->setPublished(false);
    $node->save();
    $response->addCommand(new AlertCommand('Post ' . $node->getTitle() . ' unpublished'));
  return $response;
  }
}
