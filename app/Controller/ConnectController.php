<?php

namespace Controller;

use \W\Controller\Controller;

class ConnectController extends Controller
{

    /**
     * Page d'accueil par défaut
     */
    public function connect()
    {
        if (isset($_POST['connect'])) {
            /* if(empty($_POST['login']) || empty($_POST['password'])) {
                 // Redirection vers le login
                 $this->redirectToRoute('connect');
             }*/
            $userManager = new \Manager\LoginPageManager();
            // Creation du Manager
            $authentificationManager = new \W\Security\AuthentificationManager();
            $id = $authentificationManager->isValidLoginInfo($_POST['login'], $_POST['password']);


            // Si la connexion a reussi
            if ($id != 0) {
                $userInfos = $userManager->find($id);
                $authentificationManager->logUserIn($userInfos);
                $this->redirectToRoute('home');
            } else {
                echo 'La connexion a échoué';
            }
            $this->show('loginPage/connect');

        }
    }
}