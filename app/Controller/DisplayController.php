<?php

namespace Controller;

use \W\Controller\Controller;

class DisplayController extends Controller
{

    /***
     * Fonction pour page "home" 
     * Shops les plus consultées 
     * Shops les plus récents
     ***/
    public function listing()
    {
        $manager            = new \Manager\ShopManager();
        $shopsMostViewed    = $manager->mostViewed();
        $shopsMostRecent    = $manager->mostRecent();
        $activities         = $manager->getAllActivities();
        
        /*** Envoi à la page home ***/
        $this->show('display/home', 
            [
                'shopsMostViewed'   => $shopsMostViewed,
                'shopsMostRecent'   => $shopsMostRecent,
                'activities'        => $activities
            ]);
    }

    /***
     * Fonction pour page "search" 
     * Récupère les shops contenant le tag dans la description 
     * Récupère les products contenant le tag dans la description
     ***/
    public function search()
    {
        $manager = new \Manager\SearchManager();
        
        /*** Si search_submit à été cliqué ***/
        if(isset($_POST['search_submit'])){

            /*** Récupération et nettoyage saisie ***/
            $tagSearch = trim(htmlspecialchars($_POST['search_bar']));

            /*** Appel des fonctions pour comparaison en DB ***/
            $resultShops = $manager->searchShop($tagSearch);

            /*** Envoi à la page "search" ***/
            $this->show('display/search', 
                [
                    'resultShops'=> $resultShops,
                ]);

            /*** Redirection vers "search" ***/
            $this->redirectToRoute('search');
        }
    }

    public function shopActivity($id)
    {
        $manager = new \Manager\ShopManager();

        $shopByActivity = $manager->getShopByActivity($id);
        $categorySearch = $manager->getCategorySearch($id);

        $this->show('display/activity-shop', 
            [
            'shopByActivity' => $shopByActivity,
            'categorySearch' => $categorySearch
            ]);

    }

}