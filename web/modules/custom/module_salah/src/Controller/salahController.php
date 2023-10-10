<?php
namespace Drupal\module_salah\Controller;
use Drupal\Core\Controller\ControllerBase;
/**
 * celui ci est salah controller
 */
class salahController extends ControllerBase{



  public function recetteList(){

    $recettes = [
      ['name' => 'Tagine'],
      ['name' => 'Couscous'],
      ['name' => 'Tanjia'],
      ['name' => 'Rfissa'],
      ['name' => 'saffa'],
      ['name' => 'Chiwaa'],
      ['name' => 'Bastila'],
    ];

   /* $ourrecettes = '';
    foreach ($recettes as $recette){
      $ourrecettes .='<li>'. $recette['name'].'</li>';
    }*/

    return [
      '#theme' => 'recettes-liste',
      '#items'=> $recettes,
      '#title' => $this->t('Nos meilleures recetes du Maroc')
    ];
  }

  public function requests() {
    //Requete pour récupérer les id des contenus, d'utilisateurs, & des cpmmentaires si on en a.
    $query = \Drupal::entityQuery('node');
    $nids = $query->execute();

    $query = \Drupal::entityQuery('user');
    $uids = $query->execute();

    $query = \Drupal::entityQuery('comment');
    $cids = $query->execute();
    //dsm($nids);

    $query = \Drupal::entityQuery('node')->condition('type', 'article');
    $filtred_article_nids = $query->execute();

    $query = \Drupal::entityQuery('node')->condition('type', 'page');
    $filtred_page_nids = $query->execute();

    //Affichage des résultats
    $markup = 'contenu qui a id n°:' . implode(', ',$nids );
    $markup .= '</br> utilisateur qui a id n°:' . implode(', ',$uids );
    $markup .= '</br> commentaire qui a id n°:' . implode(', ',$cids );
    $markup .= '</br> filtrage de contenu type article:' . implode(', ',$filtred_article_nids );
    $markup .= '</br> filtrage de contenu type page de base:' . implode(', ',$filtred_page_nids );

    $build = array(
      '#type' => 'markup',
      '#markup' => $markup,
    );

    return $build;

  }
}
