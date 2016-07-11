<?php

namespace Controller;

use \W\Controller\Controller;

class LoginPageController extends Controller
{

    /**
     * Page d'inscription
     */

    public function login()
    {
        $this->show('loginPage/signup');
    }

    public function connect()
    {
       
        $this->show('loginPage/connect');
    }

}