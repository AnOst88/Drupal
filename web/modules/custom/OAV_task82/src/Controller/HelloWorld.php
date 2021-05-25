<?php

/**
 * @file
 * Contains \Drupal\OAV_task82\Controller\HelloWorld.
 */
namespace Drupal\OAV_task82\Controller;

use Drupal\Core\Controller\ControllerBase;


/**
 * provides route for custom module.
 */
class HelloWorld extends ControllerBase {

/**
 * Display simple page.
 */
public function content(){
    return [
        '#markup' => 'Hello, world',
      ];
}
}