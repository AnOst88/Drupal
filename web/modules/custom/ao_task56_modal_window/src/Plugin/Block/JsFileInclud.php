<?php

namespace Drupal\ao_task56_modal_window\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JsFileInclud' block.
 * 
 *  * @Block(
 *  id = "modal_window",
 *  admin_label = @Translation("Task 56 modal window"),
 * )
 */
class JsFileInclud extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
  
    $build = [];
    $build['#markup'] = 'Task 56 modal window';
    $build['#markup'] = '<a class="use-ajax" href="/task56" data-dialog-type="modal">Modal Window</a>';

    return $build;
  }
}