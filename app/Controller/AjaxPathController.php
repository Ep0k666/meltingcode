<?php

/**
 * Created by HLEHAIN.
 **/
namespace Controller;
use W\Controller\Controller;
class AjaxPathController extends Controller
{
    /**
     * ajout du path en db
     * @rogmap 2 autocompleteute ajax_path_create
     */
    public function add()
    {
        if (isset($_POST['shop-add'])) {
            // récupérer le user courant
            $user_id = json_decode($_POST['user_id']);
            // créer le chemin en BDD
            /*    $data = [
                    'id_user' => $user_id
                ];
                $path = (new \Model\PathModel()) -> insert($data);*/
            // créer les étapes du chemin EN BDD
            /*$pointsList = json_decode($_POST['points_to_add']);*/
            $lat = json_decode($_POST['lat']);
            $lng = json_decode($_POST['lng']);

            $manager = new \Manager\PathStepManager();
            $manager->insert([
                'latitude' => $lat,
                'longitude' => $lng
            ]);
        }
    }
    /**
     * function permettant de récupérer les latitudes et longitudes en fonction de la distance choisit par l'utilisateur
     * @route ajax_path_search
     */
    /*public function search()
    {
        // récupérer la distance de rechercher qui a été envoyé en ajax
        $search_distance = $_GET['search_distance'];
        $strposition_lat = $_GET['strposition_lat'];
        $strposition_lng = $_GET['strposition_lng'];
        $manager = new \Model\PathStepModel();
        $results = $manager->searchStepPath($search_distance,$strposition_lat,$strposition_lng);
        
        $this->showJson($results);
    }*/
}