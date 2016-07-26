<?php

namespace Controller;

use \W\Controller\Controller;
class LoginPageController extends Controller
{

    public function login()
    {

        if (isset($_POST['add-user'])) {

            if (!empty($_POST['login']) && !empty($_POST['pass1']) && !empty($_POST['mail']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) &&
                !empty($_POST['company']) && (isset($_POST['login']) && isset($_POST['pass1']) && isset($_POST['mail']) && isset($_POST['firstname']) && isset($_POST['lastname']) &&
                    isset($_POST['company']))
            ) {
                $usersManager = new \Manager\LoginPageManager();
                $usersManager->setTable('users');
                $data = [
                    'login' => htmlspecialchars($_POST['login'], FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'password' => htmlspecialchars(password_hash($_POST['pass1'], PASSWORD_DEFAULT)),
                    'firstname' => htmlentities($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'company' => htmlspecialchars($_POST['company'], FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'lastname' => htmlspecialchars($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'email' => filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL),
                    'role' => 'editeur',
                ];
                $usersManager->insert($data);
            }
        }
        $this->show('/loginPage/signup');

    }

    public function logoff()
    {

        $authentificationManager = new \W\Security\AuthentificationManager();
        $authentificationManager->logUserOut();
        $this->redirectToRoute('connexion');

    }


}