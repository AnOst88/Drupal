<?php

namespace Drupal\ao_task122_custom_event\Controller;

use Drupal\Core\Controller\ControllerBase;

class CustomEvent extends ControllerBase {

    public function content() {

        return [
        '#markup' => t('Custom Event'),
        ];
    }
}