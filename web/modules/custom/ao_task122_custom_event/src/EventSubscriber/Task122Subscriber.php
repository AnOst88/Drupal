<?php

namespace Drupal\ao_task122_custom_event\EventSubscriber;

use Drupal\ao_task122_custom_event\Event\PageLoadEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class UserLoginSubscriber.
 *
 * @package Drupal\ao_task122_custom_event\EventSubscriber
 */
class Task122Subscriber implements EventSubscriberInterface {

  /**
   * Date formatter.
   *
   * @var \Drupal\Core\Datetime\DateFormatterInterface
   */
  protected $dateFormatter;

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return [
      PageLoadEvent::PREPROCESS_HTML => ['preprocessHtml', 100],
    ];
  }

  /**
   * Subscribe to the page load event dispatched.
   *
   * @param \Drupal\ao_task122_custom_event\Event\PageLoadEvent $event
   *   Dat event object yo.
   */
  public function preprocessHtml(PageLoadEvent $event) {   
    $messenger = \Drupal::service('messenger');
    $messenger->addMessage('Event for preprocess HTML called');
//     $dateFormatter = \Drupal::service('date.formatter');
//     $view = \Drupal\views\Views::getView('/show/cache');
//     $current_path = \Drupal::service('ao_task78_cache.name')->getPath();

// //  if ($current_path) {
//       \Drupal::logger('Custom hook event')->notice('Simple Page Loaded');
      // \Drupal::messenger()->addStatus(t('С ВОЗВРАЩЕНИЕМ, Ваш аккаунт был создан -  %created_date.', [
      //   '%created_date' => $dateFormatter,
      // ]));
 // }
  }
}