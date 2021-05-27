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

    $query->addField('nfbi', 'field_book_isbn_value');
    $query->join('node__field_book_isbn', 'nfbi', 'nfbi.entity_id = nfd.nid');
    $query->condition('nfd.type', 'book');
    $query->range(0, 10);
    
    $db_list = $query->execute()->fetchAll(\PDO::FETCH_ASSOC);

    $header = ['Title', 'ID', 'Created', 'ISBN'];  

    
    $output[] = array(
      '#theme' => 'table',
      '#caption' => 'The table caption / Title',
      '#header' => $header,
      '#rows' => $db_list,
    );

    return  $output;
  }

}
