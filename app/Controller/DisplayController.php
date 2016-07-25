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
        /*** Shop Manager ***/
        $manager         = new \Manager\ShopManager();

        /*** Shops les plus vues ***/
        $shopsMostViewed = $manager->mostViewed();

        /*** Shops les plus récentes ***/
        $shopsMostRecent = $manager->mostRecent();

        /*** Toutes les activités des shops ***/
        $activities      = $manager->getAllActivities();

        /*** Show to template 'home' ***/
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
        /*** Search Manager ***/
        $manager = new \Manager\SearchManager();

        /*** Si le formulaire de recherche a été soumi ***/
        if(isset($_POST['search_submit'])){

            /*** Récupération et nettoyage saisies ***/
            $tagSearch   = trim(htmlspecialchars($_POST['search_bar']));

            /*** Comparaison des saisies avec infos shops en DB ***/
            $resultShops = $manager->searchShop($tagSearch);

            /*** Show to template "search" ***/
            $this->show('display/search',
                [
                    'resultShops'   => $resultShops,
                    'tagSearch'     => $tagSearch
                ]);

            /*** Redirect to template "search" ***/
            $this->redirectToRoute('search');
        }
    }

    /***
     * Fonction pour page "detailed-search"
     * Récupère les shops correspondant à la recheche effectué
     ***/
    public function detailedSearch()
    {
        /*** Search Manager ***/
        $searchManager      = new \Manager\SearchManager();

        /*** Shop Manager ***/
        $shopManager         = new \Manager\ShopManager();

        /*** Récupère tous les noms d'activités ***/
        $activities       = $shopManager->getAllActivities();


        /*** Si le formulaire n'a pas été soumi ***/


        $this->show('display/detailed-search', [
            'activities' => $activities
        ]);

        /*** Si le formulaire de recherche détaillée a été soumi ***/
        if(isset($_POST['search_detailed']))
        {
            /*** Enregistrement du tag si existant***/
            if(isset($_POST['tag_detailed']))
            {
                $tag_detailed = trim(htmlspecialchars($_POST['tag_detailed']));
            }

            /*** Enregistrement des catégories si existantes ***/
            foreach($activities as $activity)
            {
                if(isset($_POST['$activity["name_id"]']))
                {
                    $ . $_POST['activity']
                }
            }
        }

    }

    /***
     * Fonction pour page "home"
     * Récupère les shops correspondant à l'activité choisi
     ***/
    public function shopActivity($id)
    {
        /*** Shop Manager ***/
        $manager        = new \Manager\ShopManager();

        /*** Récupère les shops par activité ***/
        $shopByActivity = $manager->getShopByActivity($id);

        /*** Récupère l'activité choisi ( pour titre )***/
        $activitySearched = $manager->getActivitySearched($id);

        /*** Récupère tous les noms d'activités ***/
        $activities       = $manager->getAllActivities();

        /*** Show to template 'activity-shop' ***/
        $this->show('shops/activity-shop',
            [
                'shopByActivity' => $shopByActivity,
                'activitySearched' => $activitySearched,
                'activities' => $activities
            ]);
    }
}