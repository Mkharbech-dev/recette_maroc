<?php

namespace Drupal\custom_config\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure custom_config settings for this site.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'custom_config_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['custom_config.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['sociallinks'] = [
      '#type' => 'details',
      '#title' => $this->t('Liens sociaux'),
      '#open' => True,
    ];
    $form['sociallinks']['facebook'] = [
      '#type' => 'textfield',
      '#title' => $this->t('facebook'),
      '#open' => $this->config('custom_config.settings')->get('facebook'),
    ];
    $form['sociallinks']['twitter'] = [
      '#type' => 'textfield',
      '#title' => $this->t('twitter'),
      '#open' => $this->config('custom_config.settings')->get('twitter'),
    ];
    $form['sociallinks']['linkdin'] = [
      '#type' => 'textfield',
      '#title' => $this->t('linkdin'),
      '#open' => $this->config('custom_config.settings')->get('linkdin'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    //Validation des valeur de formulaire
    $facebook = $form_state->getValue('facebook');
    $twitter = $form_state->getValue('twitter');
    $linkdin = $form_state->getValue('linkdin');
    if (!filter_var($facebook, FILTER_VALIDATE_URL)){
        $form_state->setErrorByName('facebook', $this->t('lien de facebook n\'est pas valide!'));
    }
    if (!filter_var($twitter, FILTER_VALIDATE_URL)){
      $form_state->setErrorByName('twitter', $this->t('lien de twitter n\'est pas valide!'));
    }
    if (!filter_var($linkdin, FILTER_VALIDATE_URL)){
      $form_state->setErrorByName('linkdin', $this->t('lien de linkdin n\'est pas valide!'));
    }

    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('custom_config.settings')
      ->set('facebook', $form_state->getValue('facebook'))
      ->set('twitter', $form_state->getValue('twitter'))
      ->set('linkdin', $form_state->getValue('linkdin'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
