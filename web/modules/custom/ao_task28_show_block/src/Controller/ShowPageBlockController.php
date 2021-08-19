<?php

namespace Drupal\ao_task28_show_block\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Block output depending on url parameter.
 */
class ShowPageBlockController extends ControllerBase {

  /**
   * Get and show block depending on url parameter.
   */
  public function ShowBuildBlock(int $block_url) {
    $bid = 1; 
    $block = \Drupal\block_content\Entity\BlockContent::load($bid);
    $output = \Drupal::entityTypeManager()->getViewBuilder('block_content')->view($block);
    $html = \Drupal::service('renderer')->renderPlain($output);

    $final_output = '';
    for ($i = 1; $i <= $block_url; $i++) {
      $final_output .= $html;
    }

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $final_output,
    ];
    
    return $build;
  }
}
