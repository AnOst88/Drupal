<?php

namespace Drupal\ao_task78_test_cache\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Entity\User;
use Drupal\core\Cache\Cache;

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
    $data = null;
    $cache_user_name = \Drupal::cache()->get('cachedUser', $user_name, $data,  Cache::PERMANENT);

    $cache_tags = [
      'cachedUser:5',
      'cachedUser:3',
      'cachedUser:6',
    ];
    
    $data = $cache_user_name->data;
    if (empty($cache_user_name)) {
     // \Drupal::cache()->set('cachedUser', $user_name);
     \Drupal::cache()->set('cachedUser', $user_name,  Cache::PERMANENT,  $cache_tags);
     $t = \Drupal\Core\Entity\EntityTypeInterface::getListCacheTags();
     dump($t);
     $cache_user_name = \Drupal::cache()->get($user_name, TRUE);
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
  public function showCacheUserName($user_name) {
    $cache = \Drupal::cache()->get('cachedUser', TRUE);
    return [
      '#markup' => $cache->data,
    ];
  }
}