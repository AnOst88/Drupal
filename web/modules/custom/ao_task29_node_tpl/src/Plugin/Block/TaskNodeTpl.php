<?php

namespace Drupal\ao_task29_node_tpl\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;

/**
 * Provides a 'TaskNodeTpl' block.
 *
 * @Block(
 *  id = "node_tpl",
 *  admin_label = @Translation("Block Node TPL"),
 * )
 */
class TaskNodeTpl extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    return [
      '#theme' => 'node_tpl',
    ];
  }
}
