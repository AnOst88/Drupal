<?php

namespace Drupal\OAV_task82\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'MyPlugin' block.
 *
 * @Block(
 *  id = "my_plugin_hello",
 *  admin_label = @Translation("firstplugin"),
 * )
 */
class MyPlugin extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#theme'] = 'my_plugin_hello';
     $build['my_plugin_hello']['#markup'] = 'Implement MyPlugin.';

    return $build;
  }

}
