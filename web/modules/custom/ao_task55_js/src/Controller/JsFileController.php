<?php

namespace Drupal\ao_task55_js\Controller;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\AlertCommand;
use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for ao_task55_js routes.
 */
class JsFileController extends ControllerBase {

  /**
   * Builds page title.
   */
  public function content() {

    $output = [];
 
    $output['#title'] = 'Task-55 Alert ajax request';
 
    return $output;
  }

/**
 * Returns Ajax alert responses for ao_task55_js routes.
 */
  public function ajaxLinkAlert() {

    # New response
    $response = new AjaxResponse();

    # Commands Ajax
    $response->addCommand(new AlertCommand('ALERT'));

    # Return response
    return $response;

  }
  
}