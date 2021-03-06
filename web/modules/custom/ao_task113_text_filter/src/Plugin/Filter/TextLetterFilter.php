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
 */
class TextLetterFilter extends FilterBase {

   /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $form['search'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Enter words'),
      '#default_value' => $this->settings['search'],
      '#description' => $this->t('Enter the words you want to find in the text. And first letter of this words raise uppercased. Enter words separated by a space.'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function process($text, $langcode): FilterProcessResult
  {
    $result = new FilterProcessResult($text);
    $words = $this->settings['search'];
    $replaceable_words = explode(' ', $words);
    $replacements = [];

    foreach ($replaceable_words as $key => $value) {
      $replacements[$key] = mb_convert_case($value, MB_CASE_TITLE);
    }
    $fixed_text = str_replace($replaceable_words, $replacements, $text);
    $result->setProcessedText($fixed_text);

    return $result;
  }
}


