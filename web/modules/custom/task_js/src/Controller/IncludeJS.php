<?php

namespace Drupal\task_js\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for task_js routes.
 */
class IncludeJS extends ControllerBase {

  /**
   * Builds the response.
   */
  public function content() {

    $output = array();
 
    $output['#title'] = 'Task-94 Include JS/Time-Block';
    $output['#markup'] = 'Include';
    $output['#attached']['library'][] = 'task_js/task_js';
 
    return $output;
  }
}