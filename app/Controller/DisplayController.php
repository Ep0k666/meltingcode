<?php

namespace Controller;

use \W\Controller\Controller;

class DisplayController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
<<<<<<< HEAD
<<<<<<< HEAD

	public function home()
	{
		$this->show('display/home');
	}

	public function listing()
=======
	public function home()
>>>>>>> c902c4249d9b6b0e78e0ebe9c5f6136a74bf9c27
=======
	public function home()
>>>>>>> steven
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
<<<<<<< HEAD
<<<<<<< HEAD


=======
>>>>>>> c902c4249d9b6b0e78e0ebe9c5f6136a74bf9c27
=======
>>>>>>> steven
}