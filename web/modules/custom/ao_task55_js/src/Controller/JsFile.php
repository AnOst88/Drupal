<?php

namespace Drupal\ao_task55_js\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for ao_task55_js routes.
 */
class JsFile extends ControllerBase {

  /**
   * Builds the response.
   */
  public function content() {

    $output = [];
 
    $output['#title'] = 'Task-55 JS';
    $output['#markup'] = 'Include JS File';
    $output['#attached']['library'][] = 'ao_task55_js/ao_task55_js';
 
    return $output;
  }
}