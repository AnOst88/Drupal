<?php

namespace Drupal\ao_task\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'ConfBaseForm' block.
 *
 * @Block(
 *  id = "conf_base_form",
 *  admin_label = @Translation("Conf base form"),
 * )
 */
class ConfBaseForm extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#theme'] = 'conf_base_form';
     $build['conf_base_form']['#markup'] = 'Implement ConfBaseForm.';

    return $build;
  }

}
