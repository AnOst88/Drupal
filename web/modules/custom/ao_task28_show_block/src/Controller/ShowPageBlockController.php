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
  public function build(int $block_url) {
    for ($i = 1; $i <= $block_url; $i++) {
      $bid = 1; // Existing block created via UI.
      $block = \Drupal\block_content\Entity\BlockContent::load($bid);
      $render = \Drupal::entityTypeManager()->getViewBuilder('block_content')->view($block);
      $html = \Drupal::service('renderer')->renderPlain($render);
      $build['#markup'] = $html;
    } 
    return $build;
  }
}
