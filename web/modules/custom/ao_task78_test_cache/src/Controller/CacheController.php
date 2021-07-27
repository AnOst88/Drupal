<?php

namespace Drupal\ao_task78_test_cache\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Provides route responses for the Cache module.
 */
class CacheController extends ControllerBase {


  /**
   * Index.
   *
   */
  public function index(){
    return[
      $this->getUserName(),
      $this->getCachedUserName()
    ];
  }
  
  /**
   * Get authorized user name.
   *
   */
  public function getUserName(){
    // Get account name from ID
    $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
    $user_name = $user->get('name')->value;
     // Return name from page
     return [
      '#markup' => $this->t('<h2>' . 'User name: Hello - ' . $user_name . '</h2>'),
      '#cache' => [
        'max-age' => 0
      ]
    ];
  }

  /**
   * Cached user name.
   *
   */
  public function getCachedUserName() {
    // Get account name from ID
    $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
    $userName = $user->getUserName();
    $uid = $user->get('uid')->value;
    // Get route name
    $route_name = \Drupal::routeMatch()->getRouteName('ao_task78_cache.cache');
    // Get cached user name
    $getCacheUser = \Drupal::cache()->get('cachedUser', TRUE);
    //dump($user_name);
    if ($route_name && empty($getCacheUser)) {
      // Cached user name
      $this->cachedUserName($userName, $uid);
      $getCacheUser = \Drupal::cache()->get('cachedUser', TRUE);
      // dump( $getCacheUser);
    } 
    else { //Update name
      $this->updateUserName();
      $getCacheUser = \Drupal::cache()->get('cachedUser', TRUE);
    }
    // Return name from page
    return [
      '#markup' => $this->t('<h2>' . 'Name from cache:  %name' . '</h2>', [
        '%name' => $getCacheUser->data, 
      ]),
    ];
  }

  /**
   * Cached user name
   */
  public function cachedUserName($cachedName) {
    \Drupal::cache()->set('cachedUser', $cachedName);
  } 

  /**
   * Update user name
   */
  public function updateUserName() {
    $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
    $userName = $user->get('name')->value;
    $uid = $user->get('uid')->value;
    if(\Drupal::cache()->get('cachedUser', TRUE) != $userName){
      $this->cachedUserName($userName, $uid);
    }
  } 
}