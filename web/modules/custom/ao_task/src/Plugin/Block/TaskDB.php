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
    $query->fields('nfd', ['title', 'nid', 'created']);
    $query->condition('nfd.type', 'article');
    $query->range(0, 10);

    $db_list = $query->execute()->fetchAll(\PDO::FETCH_ASSOC);

    
    $header = ['Title', 'ID', 'Created'];
    
    $output[] = array(
      '#theme' => 'table',
      '#caption' => 'The table caption / Title',
      '#header' => $header,
      '#rows' => $db_list,
    );

    return  $output;
  }

}
