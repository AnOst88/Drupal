<?php

namespace Drupal\ao_task78_test_cache\Controller;

use Drupal\Core\Controller\ControllerBase;
use \Drupal\user\Entity\User;

/**
 * Provides route responses for the Cache module.
 */
class CacheController extends ControllerBase {

  /**
   * Cached user name.
   *
   */
  
  public function getCachedUserName() {
    // Get user name
    $user = User::load(\Drupal::currentUser()->id());
    $user_name = $user->get('name')->value;
    // Get cached user name
    $cache_user_name = \Drupal::cache()->get('cachedUser', TRUE);

    if (empty($cache_user_name)) {
      // Cached user name
      \Drupal::cache()->set('cachedUser', $user_name);
      $cache_user_name = \Drupal::cache()->get('cachedUser', TRUE);
    } 
    // Return name from page
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
    $cache = \Drupal::cache()->get('cachedUser', TRUE);
    return [
      '#markup' => $cache->data,
    ];
  }
}