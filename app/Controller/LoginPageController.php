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

        /*echo "start var_dump<br />\n";
        var_dump($_POST);
        echo "fin var_dump<br />\n";*/

        if(isset($_POST['add-user'])){

            if(!empty($_POST['username']) && !empty($_POST['pass1']) && !empty($_POST['mail']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])&&
                !empty($_POST['company'])&&(isset($_POST['username']) && isset($_POST['pass1']) && isset($_POST['mail']) && isset($_POST['firstname']) && isset($_POST['lastname'])&&
                isset($_POST['company'])))
            {
                $usersManager = new \Manager\LoginPageManager();
                $usersManager->setTable('users');
                $usersManager->insert([
                    'username' => htmlspecialchars( $_POST['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'password' => htmlspecialchars( password_hash($_POST['pass1'], PASSWORD_DEFAULT)),
                    'firstname' => htmlentities($_POST['firstname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'company' => htmlspecialchars($_POST['company'], FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'lastname' => htmlspecialchars($_POST['lastname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                    'mail' => filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL),
                    'role' => 'editeur',
                ]);
            }
        }
        $this->show('/loginPage/signup');

    }

    public function logoff()
    {

        $authentificationManager = new \W\Security\AuthentificationManager();
        $authentificationManager->logUserOut();
        $this->redirectToRoute('user_login');

    }

    public function connect()
    {
        if(isset($_POST['login-button'])) {
            // Si les champs sont remplis
            if(!empty($_POST['mail']) && !empty($_POST['pass'])) {
                // On recupere les donnees de l'utilisateur
                $user = getUser($_POST['mail']);

                // Si $user est vide, c'est qu'il n'existe pas en DB
                if(empty($user)) {
                    $errorLogin = true;
                }
                // Sinon, on verifie le mot de passe
                else {
                    if(password_verify($_POST['pass'], $user['pass'])) {
                        // Mot de passe correct
                        $_SESSION['user'] = $user;
                    } else {
                        // Mot de passe incorrect
                        $errorLogin = true;
                    }
                }
            } else {
                $errorEmptyFields = true;
            }
        }

        $this->show('loginPage/connect');
    }

}