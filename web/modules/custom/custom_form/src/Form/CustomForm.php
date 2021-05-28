<?php

namespace Drupal\custom_form\form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class CustomForm extends FormBase
{

    /**
     * {@inheritdoc}
     */

    public function getFormId()
    {
        return 'custom_form';
    }

    protected function getEditableConfigNames()
    {
        return [
            'custom_form.settings',
        ];
    }

    /**
     * {@inheritdoc}
     */


    public function buildForm(array $form, FormStateInterface $form_state)
    {
        //$config = $this->config('custom_form.settings');
        $form['fild_1'] = [
            '#type' => 'select',
            '#title' => $this
                ->t('Select element'),
            '#options' => [
                'Ireland' => $this->t('Ireland'),

                'Japan' => $this->t('Japan'),

                'Malta' => $this->t('Malta'),

                'Spain' => $this->t('Spain'),

                'Sweden' => $this->t('Sweden'),

            ],
        ];

        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Send'),
        ];

        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        drupal_set_message($form_state->getValue('fild_1') . '');
    }
}
