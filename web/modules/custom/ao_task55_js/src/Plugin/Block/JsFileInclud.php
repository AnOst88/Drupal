<?php

namespace Drupal\ao_task55_js\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JsFileInclud' block.
 * 
 *  * @Block(
 *  id = "js_file_includ",
 *  admin_label = @Translation("Task 55 Alert Block"),
 * )
 */
class JsFileInclud extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
  
    $build = [];
    $build['#markup'] = 'Task 55 Alert Block';
    $build['#markup'] = '<a href="/task55" class="use-ajax" data-dialog-type="modal">Запрос</a>';

    return $build;
  }
}