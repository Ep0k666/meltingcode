<?php

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller
{
    public function login()
    {

        if(isset($_POST['add-user'])){

                if(isset($_POST['username']) && isset($_POST['pass1']) && isset($_POST['mail']) && isset($_POST['firstname']) && isset($_POST['lastname'])&&
                    isset($_POST['company']) && isset($_POST['password']))
                    {

                        // Si on a toutes les infos

                    $usersManager = new \Manager\UsersManager();
                    $usersManager->insert([
                        'username' => $_POST['username'],
                        'password' => password_hash($_POST['pass1'], PASSWORD_DEFAULT),
                        'firstname' => $_POST['firstname'],
                        'lastname' => $_POST['lastname'],
                        'mail' => $_POST['mail'],
                        'role' => $_POST['role'],
                    ]);
                    }
            }
            $this->show('/loginPage/signup');
        }


}