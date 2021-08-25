<?php

namespace Drupal\ao_task33_ajax_country_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\taxonomy\Entity\Term;

/**
 * contact form.
 */
class AjaxCountryForm extends FormBase {

  /**
   * Form ID.
   */
  public function getFormId() {
    return 'ajax_country_form';
  }

  /**
   * Build form.
   * 
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $country_options = [];
    $city_options = [];
    $terms_country = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('country');
    $get_country = $form_state->getValue('taxonomy_country');

    foreach ($terms_country as $country) {
      $country_options[$country->tid] = $country->name;
    }
 
    if (!empty($get_country)){
      $terms_city = \Drupal::entityTypeManager()->getStorage('taxonomy_term')
        ->getQuery()
        ->condition('vid', 'city')
        ->condition('field_city_country', $get_country)
        ->execute();

      foreach ($terms_city as $city) {
        $term = \Drupal::entityTypeManager()
          ->getStorage('taxonomy_term')
          ->load($city);
        $city_options[$term->id()] = $term->getName();
      }
    }
    
    $form['taxonomy_country'] = [
      '#type' => 'select',
      '#options' => $country_options,
      '#title' => $this->t('Country'),
      '#ajax' => [
        'callback' => '::myAjaxCallback',
        'event' => 'change',
        'wrapper' => 'ajax_city',
      ],
    ];
    
    $form['taxonomy_city'] = [
      '#type' => 'select',
      '#prefix' => '<div id="ajax_city">',
      '#suffix' => '</div>',
      '#options' => $city_options,
      '#title' => $this->t('City'),
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Push'),
    ];
    return $form;
  }

  /**
  * Ajax callback.
  */
  public function myAjaxCallback(array &$form, FormStateInterface $form_state) {
    return $form['taxonomy_city'];
  }

  /**
  * {@inheritdoc}
  */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
    if (empty($form_state->getValue('taxonomy_city'))) {
      $form_state->setErrorByName('error',
      $this->t('City is not select.'));
      \Drupal::logger('ao_task33_ajax_country_form')->notice('City is not select');
    }

    $phone = $form_state->getValue('phone');
      if (!empty($phone) > 0 && !preg_match('/^[0-9]{1,3}-[0-9]{2}-[0-9]{3,4}-[0-9]{3}$/', $phone)) {
        $this->messenger()->deleteAll();
        $form_state->setErrorByName('error',
        $this->t('Phone number must be in format - xxx-xx-nnnn-nnn.'));
      }
       
    if (strlen($phone) > 0) {
      $phone = str_replace (' ', '', $phone);
      $phone = str_replace ('-', '', $phone);
      $phone = str_replace ('(', '', $phone);
      $phone = str_replace (')', '', $phone);
      $phone = str_replace ('[', '', $phone);
      $phone = str_replace (']', '', $phone);
      $phone = str_replace ('{', '', $phone);
      $phone = str_replace ('}', '', $phone);
      
      if (!preg_match('/^(375|80)(29|25|44|33)(\d{3})(\d{2})(\d{2})$/',$phone)) {
        $this->messenger()->deleteAll();
        $form_state->setErrorByName('error',
        $this->t("Please enter valid country code (375) or operator code (25,29,33,44)."));
      }
    }
  }
  

  /**
  * Submit form.
  */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $get_option_country = $form_state->getValue('taxonomy_country');
    $object_country = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($get_option_country);
     
    $get_option_city = $form_state->getValue('taxonomy_city');
    $object_city = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($get_option_city);
   
    if (!$object_country instanceof Term) {
      $this->messenger()
        ->addError($this->t('Country with id @id not found', ['@id' => $get_option_country]));
      return;
    }

    if (!$object_city instanceof Term) {
      $this->messenger()
        ->addError($this->t('City with id @id not found', ['@id' =>  $get_option_city ]));
      return;
    }

    $context = $this->t('City - %t_city. Country - %t_country. Phone - %t_phone', [
      '%t_city' => $object_city->get('name')->value,
      '%t_country' =>   $object_country->get('name')->value,
      '%t_phone' => $form_state->getValue('phone')
    ]);
    \Drupal::logger('ao_task33_ajax_country_form')->notice($context);
    $this->messenger()->addMessage($context);
  }
}