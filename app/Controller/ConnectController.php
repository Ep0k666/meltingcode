<?php

namespace Controller;

use \W\Controller\Controller;

class ConnectController extends Controller
{
    public function connexion()
    {
        /*echo "start var_dump<br />\n";
        var_dump($_POST);
        echo "fin var_dump<br />\n";*/

        if (isset($_POST['connect'])) {

            $errors = [];
            if(empty($_POST['email'])) {
                $errors['email']['empty'] = 'true';

            }
            if(empty($_POST['password'])) {
                $errors['password']['empty'] = true;
            }
            if(count($errors) === 0){

                $userManager = new \Manager\UserManager();

                // Creation du Manager
                $authentificationManager = new \W\Security\AuthentificationManager();
                $id = $authentificationManager->isValidLoginInfo($_POST['email'], $_POST['password']);

                // Si la connexion a reussi
                if ($id) {
                    $userInfos = $userManager->find($id);
                    $authentificationManager->logUserIn($userInfos);
                    $this->redirectToRoute('home');
                }else{
                    echo 'La Connexion à échoué';
                    // Redirection vers le login
                    $this->show('connexion', ['errors' => $errors]);
                }

            }

        }

        $this->show('/loginPage/connect');
    }

}