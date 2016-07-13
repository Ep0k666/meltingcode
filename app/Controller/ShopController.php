<?php

namespace Controller;

use \W\Controller\Controller;

class ShopController extends Controller
{

    /**
     * Page d'accueil par défaut
     */
    public function shop()
    {
        $this->show('shop/shop');
    }

}