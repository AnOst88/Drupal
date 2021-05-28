<?php

namespace Drupal\task_js\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JsCssInclud' block.
 *
 * @Block(
 *  id = "js_css_includ",
 *  admin_label = @Translation("Js/Time-Block includ"),
 * )
 */
class JsCssInclud extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
  
    $build = [];
    $build['#theme'] = 'js_includ';
     $build['js_includ']['#markup'] = 'Date/Time';

     $time = \Drupal::time()->getRequestTime();
     $date_formatter = \Drupal::service('date.formatter');
     $build['our_example'] = [ 
      '#theme' => 'task_js',
      '#date' => $date_formatter->format($time),
     ];
    return $build;
  }
}