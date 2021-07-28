<?php

namespace Drupal\ao_task78_test_cache\Controller;

use Drupal\Core\Controller\ControllerBase;
use \Drupal\user\Entity\User;

/**
 * Provides route responses for the Cache module.
 */
class CacheController extends ControllerBase {

  public $userName;

  /**
   * Cached user name.
   *
   */
  public function getCachedUserName() {
    // Get user name
    $user = User::load(\Drupal::currentUser()->id());
    $this->userName = $user->get('name')->value;
    // Get cached user name
    $getCacheUser = \Drupal::cache()->get('cachedUser', TRUE);
    $newName = $this->saveUserName();

    if (empty($getCacheUser)) {
      // Cached user name
      \Drupal::cache()->set('cachedUser', $this->userName);
      $getCacheUser  = \Drupal::cache()->get('cachedUser', TRUE);
    } 
    else {
      $getCacheUser = $newName;
    }
    // Return name from page
    return [
      '#markup' => $this->t('<h2>' . 'Name from cache:  %name' . '</h2>', [
        '%name' =>  $getCacheUser->data, 
      ]),
      '#cache' => [
        'max-age' => 0
      ]
    ];
  }

   /**
   * Cahed and return user name.
   *
   */
  public function saveUserName(){
    \Drupal::cache()->set('cachedUser', $this->userName);
    $user_name = \Drupal::cache()->get('cachedUser', TRUE);
     
    return $user_name;
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