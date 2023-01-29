<?php
namespace Drupal\module_salah\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a block called "exemple Héro block".
 *
 * @Block(
 *   id= "module_salah_salah",
 *   admin_label =@Translation ("Example Héro block")
 * )
 */

class salahBlock extends BlockBase{

  /**
   * {@inheritdoc}
   */
  public function build(){
    $heroes = [
      ['nom_recette' => 'Tagine', 'orgine' => 'Maroc'],
      ['nom_recette' => 'Tanjia', 'orgine' => ' Marrakech'],
      ['nom_recette' => 'Rfissa', 'orgine' => ' Souss'],
      ['nom_recette' => 'couscous', 'orgine' => 'Atlas'],
      ['nom_recette' => 'chwa', 'orgine' => 'dokala'],
      ['nom_recette' => 'saffa', 'orgine' => 'Rabat'],
      ['nom_recette' => 'bestilla', 'orgine' => 'Fes'],
    ];

    $table = [
      '#type' => 'table',
      '#header' => [
        $this->t('recette'),
        $this->t('origine'),
      ]
    ];

    foreach($heroes as $hero) {
      $table[] = [
        'nom_recette' => [
          '#type' => 'markup',
          '#markup' => $hero['nom_recette'],
        ],
        'orgine' => [
          '#type' => 'markup',
          '#markup' => $hero['orgine'],
        ],
      ];
    }

    return $table;
  }
}
