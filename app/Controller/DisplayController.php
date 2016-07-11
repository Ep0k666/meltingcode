<?php

namespace Controller;

use \W\Controller\Controller;

class DisplayController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
    {
        $manager = new \Manager\ShopManager();
        $shopsMostViewed = $manager->mostViewed();
        $shopsMostRecent = $manager->mostRecent();
        
        $this->show('display/home', 
            [
                'shopsMostViewed' => $shopsMostViewed,
                'shopsMostRecent' => $shopsMostRecent
            ]);
    }
}