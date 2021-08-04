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
class TextFilter extends FilterBase{

  /**
   * {@inheritdoc}
   */
  public function process($text, $langcode) {
    $result = new FilterProcessResult($text);
    $words = $this->settings['search'];
    $replaceable_words = explode(' ', $words);
   // dump(gettype( $replaceable_words));
   //dump($replaceable_words);
    $income_texts = explode(' ', $text);
   //dump($income_texts);

    foreach($income_texts as $key => $search){
      if (in_array($income_texts[$key], $replaceable_words, true)) {
        $income_texts[$key] = mb_convert_case($search, MB_CASE_TITLE, "UTF-8");
      }
    }
    //dump($text);
    $fixed_text = implode(' ', $income_texts);
    $result->setProcessedText($fixed_text);
   
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
