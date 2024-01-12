<?php


namespace Drupal\dependency_injection_service\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;


class CustomForm extends FormBase{
  protected $load_data;

  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    // TODO: Implement getFormId() method.
    return 'custom_form';
  }

  public function __construct(){
    $this->load_data = \Drupal::service('dependency_injection_service.db_insert');
  }


  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('nom utilisateur'),
      '#required' => TRUE,
    ];
    $form['mail'] = [
      '#type' => 'email',
      '#title' => $this->t('mail utilisateur'),
      '#required' => TRUE,
    ];
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Enregistrer'),
      '#button_type' => 'primary',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $query = $this->load_data->setData($form_state);
    \Drupal::messenger()->addMessage(t('Le collaborateur'.' '.'<b>'.$form_state->getValue('name').'</b>'.' '."à été bien enregistré."),'status');
  }
}
