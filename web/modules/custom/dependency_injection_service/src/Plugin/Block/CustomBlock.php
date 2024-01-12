<?php


namespace Drupal\dependency_injection_service\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Database\Database;


/**
 * Provides a 'custom' Block.
 *
 * @Block(
 *   id = "dependency_injection_service",
 *   admin_label = @Translation("Nos utilisteurs"),
 *   category = @Translation("show users custom"),
 * )
 */

class CustomBlock extends BlockBase{

  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $data = \Drupal::service('dependency_injection_service.db_insert')->getData();
    //$conn = Database::getConnection();
    //$data = $conn->query("SELECT * FROM {customform}")->fetchAll();
    //dump($data);
    return [
      '#theme' => 'my-template',
      '#data' => $data,
      '#title' => 'Nos collaboratuers'
    ];
  }
}
