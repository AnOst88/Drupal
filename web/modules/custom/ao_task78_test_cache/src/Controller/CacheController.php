<?php

namespace Drupal\ao_task78_test_cache\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Session\AccountProxy;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides route responses for the Cache module.
 */
class CacheController extends ControllerBase {


   /**
   * User class.
   *
   * @param \Drupal\Core\Session\AccountProxy $currentUser
   * 
   */
  protected $currentUser;

  public function __construct(AccountProxy $currentUser) {
    $this->currentUser = $currentUser;
  }

    /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('current_user'),
    );
  }

  /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */
  public function myPage() {
    // Get account name
    $cid = $this->currentUser->getAccountName();
    // Get cache name
    $name = \Drupal::cache()->get('user', TRUE);
    // Check account name and cache name
   if ($name !== $cid) {
      \Drupal::cache()->set('user', $cid);
      $new_name = \Drupal::cache()->get('user', TRUE);
      return [
        '#markup' => '<h2>' . 'Hello, ' . $new_name->data . '</h2>',
        '#cache' => [
          'max-age' => 0,
        ],
      ];
    }
    // If not changed cache 
    else {
      return [
        '#markup' => '<h2>' . $name . '</h2>',
      ];
    }
  }
}