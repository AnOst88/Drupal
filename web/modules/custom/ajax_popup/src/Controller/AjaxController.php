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
        $list = $query->countQuery()->execute()->fetchField();
        $output = sprintf(
            $list,
        );
        $render = [
            '#theme' => 'ajax_popup',
            '#var' => $list,
            '#type' => 'inline_template',
        ];
        return $render;
    }
}
