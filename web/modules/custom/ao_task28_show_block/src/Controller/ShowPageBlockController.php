<?php

namespace Drupal\ao_task28_show_block\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for ao_task routes.
 */
class ShowPageBlockController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {
    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('Task 28'),
    ];
    // Show block
    $bid = 1; // Existing block created via UI.
    $block = \Drupal\block_content\Entity\BlockContent::load($bid);
    $build = \Drupal::entityTypeManager()->getViewBuilder('block_content')->view($block);
   
    return $build;
  }
}
