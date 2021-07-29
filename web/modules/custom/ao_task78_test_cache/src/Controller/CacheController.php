<?php

namespace Drupal\ao_task78_test_cache\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Entity\User;

/**
 * Provides route responses for the Cache module.
 */
class CacheController extends ControllerBase {

  /**
   * Cached user name.
   *
   */
  public function getCachedUserName() {
    $user = User::load(\Drupal::currentUser()->id());
    $user_name = $user->get('name')->value;
    $user_id = $user->get('uid')->value;
    $cache_user_name = \Drupal::cache()->get('cachedUser_' . $user_id, $user_name);

    if (empty($cache_user_name)) {
      \Drupal::cache()->set('cachedUser_' . $user_id, $user_name);
      $cache_user_name = \Drupal::cache()->get($user_name);
    } 
    return [
      '#markup' => $this->t('<h2>' . 'Name from cache:  %name' . '</h2>', [
        '%name' =>  $cache_user_name->data, 
      ]),
      '#cache' => [
        'max-age' => 0
      ]
    ];
  }

   /**
   * Return useer name from cache.
   *
   */
  public function showCacheUserName() {
    $user = User::load(\Drupal::currentUser()->id());
    $user_id = $user->get('uid')->value;
    $cache = \Drupal::cache()->get('cachedUser_' . $user_id);
    return [
      '#markup' => $cache->data,
      '#cache' => [
        'max-age' => 0
      ]
    ];
  }
}