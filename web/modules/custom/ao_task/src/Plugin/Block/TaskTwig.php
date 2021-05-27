<?php

namespace Drupal\ao_task\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'TaskTwig' block.
 *
 * @Block(
 *  id = "task_twig",
 *  admin_label = @Translation("Task twig"),
 * )
 */
class TaskTwig extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

     $build['our_example'] = [
      '#theme' => 'ao_example_first',
    ];

    return $build;
  }

}
