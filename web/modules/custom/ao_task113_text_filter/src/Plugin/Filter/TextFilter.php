<?php

namespace Drupal\ao_task113_text_filter\Plugin\Filter;

use Drupal\filter\Plugin\FilterBase;
use Drupal\filter\FilterProcessResult;
use Drupal\Core\Form\FormStateInterface;


/**
 * Replaces small letter of the word to uppercase.
 * 
 * @Filter(
 * id="text_letters_filter",
 * title=@Translation("Replacing letters"),
 * description=@Translation("Replace small letter with capital letter"),
 * type = Drupal\filter\Plugin\FilterInterface::TYPE_TRANSFORM_REVERSIBLE,
 * settings = {
 *   "search" = " ",
 *   }
 * )
 *  
 */
class TextFilter extends FilterBase{

  /**
   * {@inheritdoc}
   */
  public function process($text, $langcode) {
    $result = new FilterProcessResult($text);
    $config_text = $this->settings['search'];
    $replaceable_words = explode(',', $config_text);
    $fixed = str_ireplace($replaceable_words, ucfirst($config_text), $text);
    $result->setProcessedText($fixed);
       
    return $result;
}

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $form['search'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Search'),
      '#default_value' => $this->settings['search'],
      '#maxlength' => 1024,
      '#size' => 250,
    ];

    return $form;
  }
}