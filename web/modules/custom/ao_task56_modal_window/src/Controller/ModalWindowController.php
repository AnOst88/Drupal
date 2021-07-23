<?php

namespace Drupal\ao_task56_modal_window\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for ao_task56_modal_window.
 */
class ModalWindowController extends ControllerBase {

  /**
   * Builds page title.
   */
  public function content() {

    $output = [];
 
    $output['#markup'] = 'Task-56 Modal Window';
 
    return $output;
  }  
}