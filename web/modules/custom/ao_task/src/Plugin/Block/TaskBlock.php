<?php

namespace Drupal\ao_task\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'TaskBlock' block.
 *
 * @Block(
 *  id = "task_block",
 *  admin_label = @Translation("Task block"),
 * )
 */
class TaskBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#theme'] = 'task_block';
     $build['task_block']['#markup'] = 'Hello World.';

    return $build;
  }

}
