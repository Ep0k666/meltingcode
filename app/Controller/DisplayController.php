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
		$this->show('display/home');
	}

	public function listing()
    {
        $manager = new \Manager\ShopManager();
        $shops = $manager->findAll();
        
        $this->show('display/home', ['shops' => $shops]);
    }


}