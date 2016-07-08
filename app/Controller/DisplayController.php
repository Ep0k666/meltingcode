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

}