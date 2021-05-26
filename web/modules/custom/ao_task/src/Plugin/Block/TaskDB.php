<?php

namespace Drupal\ao_task\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'TaskDB' block.
 *
 * @Block(
 *  id = "task_db",
 *  admin_label = @Translation("Task db"),
 * )
 */
class TaskDB extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $query = \Drupal::database()->select('node_field_data', 'nfd');
    $query->fields('nfd', array('title', 'nid', 'created'));
    $query->condition('nfd.nid', 2);
    
    $object = $query->execute()->fetchAssoc();

    $header = ['Title', 'ID', 'Created'];
    $data = [
      $object,
    ];

    $output[] = array(
      '#theme' => 'table',
      '#caption' => 'The table caption / Title',
      '#header' => $header,
      '#rows' => $data,
    );

    return  $output;
  }

}
