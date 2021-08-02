<?php

/**
 * @file
 * Contains ao_task80_token.module.
 */
use Drupal\Core\render\BubbleableMetadata;

/**
 * Implements hook_token_info().
 */
function ao_task80_token_token_info() {
  $type = [
    'name' => t('Google Link'),
    'description' => t('Tokens for custom things.'),
  ];
  $node['title'] = [
    'name' => t("Google Link"),
    'description' => t('The node\'s title'),
  ];
  return [
    'types' => ['google_link' => $type],
    'tokens' => ['google_link' => $node],
  ];
}

/**
 * Implements hook_tokens().
 */
function ao_task80_token_tokens($type, $tokens, array $data, array $options, BubbleableMetadata $bubbleable_metadata) {
  $replacements = [];
  if ($type == 'google_link' && !empty($data['node'])) {
    foreach ($tokens as $name => $original) {
      switch ($name) {
        case 'title':
            $replacements[$original] = 'http://google.com';
              break;
      }
    }
  }
  return $replacements;  
}

