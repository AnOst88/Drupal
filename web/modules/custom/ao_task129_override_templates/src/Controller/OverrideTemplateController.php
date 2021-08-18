<?php

namespace Drupal\ao_task129_override_templates\Controller;

use Drupal\Core\Controller\ControllerBase;

class OverrideTemplateController extends ControllerBase {
/**
 * {@inheritdoc}
 */
  public function build() {
    $build['content'] = [
      '#type' => 'item',
      '#markup' => t('Переопределение шаблонов:')
    ];

    $build['override_templates'] = [
        '#theme' => 'override_templates',
      ];

    return $build;
  }
}
    