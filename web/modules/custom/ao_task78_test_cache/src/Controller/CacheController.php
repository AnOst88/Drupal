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
    $cid = $this->currentUser->getAccountName();

    \Drupal::cache()->set('user', $cid);
    if (!empty($item = \Drupal::cache()->get('user'))) {
      return [
        '#markup' => '<h2>' . 'Hello, ' . $item->data . '</h2>',
        '#cache' => [
            'max-age' => 0,
          ],
      ];
    } 
    else {
      return [
        '#markup' => '<h2>' . 'Log in please' . '</h2>',
        '#cache' => [
            'max-age' => 0,
        ],
      ];
    }
  }
}