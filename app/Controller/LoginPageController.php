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
        if(isset($_POST['login-button'])) {
            if(empty($_POST['mail']) || empty($_POST['password'])) {
                // Redirection vers le login
                $this->redirectToRoute('connect');
            }

            // Creation du Manager
            $authentificationManager = new \W\Security\AuthentificationManager();
            $id = $authentificationManager->isValidLoginInfo($_POST['mail'], $_POST['pass']);

            // Si la connexion a reussi
            if($id) {
                $userManager = new \Manager\UserManager();
                $userInfos = $userManager->find($id);
                $authentificationManager->logUserIn($userInfos);
                $this->redirectToRoute('home');
            }

        }
        $this->show('loginPage/signup');
    }

    public function logoff()
    {

        $authentificationManager = new \W\Security\AuthentificationManager();
        $authentificationManager->logUserOut();
        $this->redirectToRoute('user_login');

    }

    public function connect()
    {

        $this->show('loginPage/connect');
    }

}