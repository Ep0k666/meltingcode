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
        $shopsActivity      = $manager->getShopByActivity();
        $productsCategory   = $manager->getProductsByCategory();
        
        /*** Envoi à la page home ***/
        $this->show('display/home', 
            [
                'shopsMostViewed'   => $shopsMostViewed,
                'shopsMostRecent'   => $shopsMostRecent,
                'shopsActivity'     => $shopsActivity,
                'productsCategory'  => $productsCategory
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
            $resultProduct = $manager->searchProduct($tagSearch);

            /*** Envoi à la page "search" ***/
            $this->show('display/search', 
                [
                    'resultShops'=> $resultShops,
                    'resultProduct'=> $resultProduct
                ]);

            /*** Redirection vers "search" ***/
            $this->redirectToRoute('search');
        }
    }

}