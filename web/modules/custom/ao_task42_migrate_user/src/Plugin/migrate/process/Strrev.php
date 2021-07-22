<?php

namespace Drupal\ao_task42_migrate_user\Plugin\migrate\process;

use Drupal\migrate\ProcessPluginBase;

/**
 * Return reversed string.
 *
 * @MigrateProcessPlugin(
 *   id = "strrev"
 * )
 */
class Strrev extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, \Drupal\migrate\MigrateExecutableInterface $migrate_executable, \Drupal\migrate\Row $row, $destination_property) {
      if($row->get('lastname') != null){
        $value = $row->get('name') . '-' .  strrev($row->get('lastname'));
//dump($value);
        return $value;
      }
    }
  }