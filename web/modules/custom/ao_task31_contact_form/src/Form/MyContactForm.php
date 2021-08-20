<?php

namespace Drupal\ao_task31_contact_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * contact form.
 */
class MyContactForm extends FormBase {

  /**
   * Form ID.
   */
  public function getFormId() {
    return 'contact_form';
  }

  /**
   * Build form.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['username'] = [
      '#title' => $this->t('Name'),
      '#type' => 'textfield',
      '#required' => TRUE,
    ];
      
    $form['email'] = [
      '#title' => $this->t('Email'),
      '#type' => 'email',
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
      $context = $this->t('Welcome - %u_fio, your email - %u_mail.', [
        '%u_fio' => $form_state->getValue('username'),
        '%u_mail' => $form_state->getValue('email')
      ]);
      \Drupal::logger('ao_task31_contact_form')->notice($context);
      $this->messenger()->addMessage($context);
    }
}