<?php

namespace Controller;

use \W\Controller\Controller;

class NewsletterController extends Controller
{

    public function newsletter()
    {

        if(isset($_POST['news-submit'])){

            // Vérification et nettoyage des champs
            $lastname   = trim(htmlspecialchars($_POST['lastname']));
            $firstname  = trim(htmlspecialchars($_POST['firstname']));
            $age        = trim(htmlspecialchars($_POST['age']));
            $mail      = trim(filter_var($_POST['mail']), FILTER_VALIDATE_EMAIL);
            $gender     = $_POST['gender'];

            // Gestion des erreurs
            $errors = [];

            // Lastname
            if(strlen($lastname) < 3){
                $errors['lastname']['tooShort'] = true;
            }

            if(strlen($lastname) >= 50){
                $errors['lastname']['tooLong'] = true;
            }

            // Firstname
            if(strlen($firstname) < 3){
                $errors['firstname']['tooShort'] = true;
            }

            if(strlen($firstname) >= 50){
                $errors['firstname']['tooLong'] = true;
            }

            // Age
            if(empty($age)){
                $errors['age']['empty'] = true;
            }

            if(strlen($age) >= 3){
                $errors['age']['tooLong'] = true;
            }

            // Email
            if(strlen($mail) <= 8){
                $errors['mail']['tooShort'] = true;
            }

            if(strlen($mail) >= 50){
                $errors['mail']['tooLong'] = true;
            }

            if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
                $errors['mail']['format'] = true;
            }



            // Si aucune erreurs dans le tableau $errors
            if(count($errors) === 0){

                // Ajout en DB
                $manager = new \Manager\ShopManager();

                $usersForNews = $manager->setTable('newsletter');

                // Déclaration de data []
                $data = [
                'lastname'  => $lastname,
                'firstname' => $firstname,
                'age'       => $age,
                'mail'     => $mail,
                'gender'    => $gender,
                ];

                $usersForNews->insert($data);
            } 

            // S'il y des erreurs je renvoi sur newsletter avec $errors[]
            else{

                $manager = new \Manager\ShopManager();

                $this->show('display/newsletter',['errors' => $errors]);
            }
        }

        else{
            $manager = new \Manager\ShopManager();
            $this->show('display/newsletter');
        }
    }

}