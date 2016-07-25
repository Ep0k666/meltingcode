<?php

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller
{
    public function UpdateUser()
    {
        /*Pour sécuriser l'accès direct via url à la page /shops*/
        $this->allowTo(['editeur']);

        if (isset($_POST['edit-user'])){

            $login = trim(htmlspecialchars($_POST['login']));
            $company = trim(htmlspecialchars($_POST['company']));
            $firstname = trim(htmlspecialchars($_POST['firstname']));
            $lastname = trim(htmlspecialchars($_POST['lastname']));
            $email = trim(htmlspecialchars($_POST['mail']));
            $pass = trim(htmlspecialchars($_POST['pass']));


            $userManager = new \Manager\UserManager();
            $userToEdit = $userManager->setTable('user');

            $data = [
                'login' => $login,
                'company' => $company,
                'fistname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'password' => $pass,
            ];

            /* $shopToEditUpdate->update( $data,$id);*/
            $userToEdit = new \Manager\UserManager();
            $userToEdit->update($data,$id=NULL);

            $_SESSION['flash'] = 'Données mise à jour';
            $this->redirectToRoute('account');
        }else
        {
            $this->show('loginPage/loginPage');
        }
    }
}
