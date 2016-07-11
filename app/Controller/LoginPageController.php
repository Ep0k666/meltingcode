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
       /* user = $manager -> connectUser
            if user different de false
        authen*/
        $this->show('loginPage/connect');
    }

}