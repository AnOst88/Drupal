<?php

namespace Drupal\ao_task33_ajax_country_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\Core\Ajax\HtmlCommand;

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
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $terms_country = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('country');
    $country_options = [];

    foreach ($terms_country as $key => $country) {
      //$country_options[$country->tid] = $country->name;
     // dump( $country_options);
     $country_options[$key] = $country->name;
    }
    
    
    $form['taxonomy_country'] = [
      '#type' => 'select',
      '#target_type' => 'taxonomy_term',
      '#options' => $country_options,
      '#title' => t('Country'),
      '#ajax' => [
        'callback' => '::myAjaxCallback',
        'disable-refocus' => FALSE,
        'event' => 'change',
        'progress' => [
          'type' => 'throbber',
          'message' => $this->t('Verifying entry...'),
        ],
        'wrapper' => 'first',
      ],
    ];
    
    $form['taxonomy_city'] = [
      '#type' => 'select',
      '#target_type' => 'taxonomy_term',
      '#prefix' => '<div id="first">',
      '#suffix' => '</div>',
      '#validated' => 'true',
      '#options' => [],
      '#title' => t('City'),
      '#validated' => 'true',
      '#ajax' => [
        'callback' => '::myAjaxCallback2',
        'disable-refocus' => FALSE,
        'event' => 'change',
        'wrapper' => 'edit-output',
        'progress' => [
          'type' => 'throbber',
          'message' => $this->t('Verifying entry...'),
        ],
      ],
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
    $terms_city = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('city');
    $city_options = [];

    foreach ($terms_city as $key => $city) {
      $city_options[$key] = [
        '#theme' => $city->name,
      ];
    }
      
    $selctedOption = $form_state->getValue("taxonomy_country");
    $form['taxonomy_city']['#options'] = $city_options[$selctedOption]; 
      // dump($form['taxonomy_city']);
      // die();
    return $form['taxonomy_city'];
  }

  /**
  * Submit form.
  */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $context = $this->t('City - %city, country - %country.', [
      '%city' => $form_state->getValue('taxonomy_city'),
      '%country' => $form_state->getValue('taxonomy_country')
    ]);
    \Drupal::logger('ao_task33_ajax_country_form')->notice($context);
    $this->messenger()->addMessage($context);
  }
}