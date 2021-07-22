<?php

namespace Drupal\ao_task54_include_js\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for ao_task54_include_js routes.
 */
class IncludeJS extends ControllerBase {

  /**
   * Builds the response.
   */
  public function content() {

    $output = [];
 
    $output['#title'] = 'Task-54 Include JS';
    $output['#markup'] = 'Include JS File';
    $output['#attached']['library'][] = 'ao_task54_include_js/ao_task54_include_js';
 
    return $output;
  }
}