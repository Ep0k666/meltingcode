<?php

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller
{
    public function UpdateUser($id)
    {
        /*Pour sécuriser l'accès direct via url à la page /shops*/
        $this->allowTo(['editeur']);

        if (isset($_POST['edit-user'])) {


            if (isset($_POST['login'])

                && !empty($_POST['pass'])
                && !empty($_POST['mail'])
                && !empty($_POST['firstname'])
                && !empty($_POST['lastname'])
                && !empty($_POST['company'])

                && (isset($_POST['login'])
                    && isset($_POST['pass'])
                    && isset($_POST['mail'])
                    && isset($_POST['firstname'])
                    && isset($_POST['lastname'])
                    && isset($_POST['company']))
            )


                $usersManager1 = new \Manager\UserManager();
            $usersManager1->setTable('users');
            $data = [
                'login' => htmlspecialchars($_POST['login'], FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'password' => htmlspecialchars(password_hash($_POST['pass'], PASSWORD_DEFAULT)),
                'firstname' => htmlentities($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'company' => htmlspecialchars($_POST['company'], FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'lastname' => htmlspecialchars($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'email' => filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL),
                'role' => 'editeur',
            ];

            $usersManager1->update($data, $id);
            $this->redirectToRoute('account');


        }

        $this->show('/loginPage/LoginPage');


    }
}
