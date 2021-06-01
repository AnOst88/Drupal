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
            '<div class="node-short-info"><div class="node-short-info-title">Count node:%s</div></div>',
            $list,

        );
        $render = [
            '#type' => 'inline_template',
            '#template' => $output,
        ];
        return $render;
    }
}

