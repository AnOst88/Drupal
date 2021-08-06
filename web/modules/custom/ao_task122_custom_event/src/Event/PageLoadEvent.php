<?php

namespace Drupal\ao_task122_custom_event\Event;

use Symfony\Component\EventDispatcher\Event;

/**
 * Event page load.
 */
class PageLoadEvent extends Event {
  /**
   * Use hook_preprocess_page
   */

  const PREPROCESS_HTML = 'ao_task122_custom_event.frontpage.preprocess_html';
  
  /**
   * Variables from preprocess.
   */
  protected $variables;

  /**
   * DummyFrontpageEvent constructor.
   */
  public function __construct($variables) {
    $this->variables = $variables;
  }

  /**
   * Returns variables array from preprocess.
   */
  public function getVariables() {
    return $this->variables;
  }

}