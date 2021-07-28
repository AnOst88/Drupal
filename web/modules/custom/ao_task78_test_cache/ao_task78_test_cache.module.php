<?php

use Drupal\user\Entity\User;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\Core\Entity\Entity\EntityViewDisplay;

/**
 * Hook user update.
 */
function ao_task78_test_cache_user_update(EntityInterface $entity, $account) {
  // Пример
  // $user = \Drupal\user\Entity\User::load($account->id());
  // $original_value = $account->original->get('field_account_participation')->entity->tid->value;
  // $updated_value = $user->get('field_account_participation')->entity->tid->value; 
  $user = \Drupal\user\Entity\User::load($account->id());
  $original_value = $account->get('name')->value;
  $updated_value =;

  if ($original_value != $updated_value) {
   dump('OK');
  }
}