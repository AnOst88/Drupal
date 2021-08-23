<?php

namespace Drupal\ao_task32_country_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * contact form.
 */
class CountryForm extends FormBase {

  /**
   * Form ID.
   */
  public function getFormId() {
    return 'country_form';
  }

  /**
   * Build form.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $terms_city = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('city');
    $terms_country = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('country');

    $city_options = [];  
    $country_options = [];
    foreach ($terms_country as $country) {
      $country_options[$country->tid] = $country->name;
    }
    foreach ($terms_city as $city) {
      $city_options[$city->tid] = $city->name;
    }
    
    $form['taxonomy_city'] = [
      '#type' => 'select',
      '#target_type' => 'taxonomy_term',
      '#options' => $city_options,
      '#title' => t('City'),
    ];

    $form['taxonomy_country'] = [
      '#type' => 'select',
      '#target_type' => 'taxonomy_term',
      '#options' => $country_options,
      '#title' => t('Country'),
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Push'),
    ];

    return $form;
    }

    /**
     * Submit form.
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
      $context = $this->t('Saved');
      $this->messenger()->addMessage($context);
    }
}