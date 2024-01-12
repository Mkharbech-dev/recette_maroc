<?php

namespace Drupal\custom_config\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a social links block.
 *
 * @Block(
 *   id = "custom_config_social_links",
 *   admin_label = @Translation("Social links"),
 *   category = @Translation("Custom")
 * )
 */
class SocialLinksBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = \Drupal::config('custom_config.settings');
    //récupérer l'url de facebook
    $facebook = $config->get('facebook');
    //récupérer l'url de twitter
    $twitter = $config->get('twitter');
    //récupérer l'url de linkdin
    $linkdin= $config->get('linkdin');

    //Utiliser une template
    return [
      '#theme' => 'liens_sociaux',
      '#facebook' => $facebook,
      '#twitter' => $twitter,
      '#linkdin' => $linkdin,
      '#cache' => [
        'max-age' => 0,
      ]
    ];
  }

}
