<?php

namespace Controller;

use \W\Controller\Controller;

class ContactController extends Controller
{

    /***
     * Fonction pour page "contact"
     * Récupération du message et des infos users
     * Gestion des erreurs de saisies => $errors []
     ***/
    public function contact()
    {

        /*** Si on a cliqué sur send_message ***/
        if(isset($_POST['send-message'])){

            /*** Récupération et nettoyage des saisies ***/
            $name = trim(htmlspecialchars($_POST['name']));
            $mail = trim(htmlspecialchars($_POST['mail']));
            $message = trim(htmlspecialchars($_POST['message']));
            
            /** Déclaration tableau erreurs **/
            $errors = [];

            /**  Déclaration de msgInserted **/
            $msgInserted = false;

            /**************
                NAME
             **************/

            /* Vérif name integer */
            if(filter_var($name, FILTER_VALIDATE_INT)){
                $errors['name']['int'] = true;
            }

            /* Vérif name tooShort */
            if(strlen($name) < 3){
                $errors['name']['tooShort'] = true;
            }

            /* Vérif name tooLong */
            if(strlen($name) > 50){
                $errors['name']['tooLong'] = true;
            }

            /**************
                EMAIL
             **************/

            /* Vérif mail format mail */
            if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
                $errors['mail']['format'] = true;
            }

            /* Vérif name tooShort */
            if(strlen($mail) < 8){
                $errors['mail']['tooShort'] = true;
            }

            /* Vérif mail tooLong */
            if(strlen($mail) > 50){
                $errors['mail']['tooLong'] = true;
            }

            /**************
                MESSAGE
             **************/

            /* Vérif message tooShort */
            if(strlen($message) < 20){
                $errors['message']['tooShort'] = true;
            }

            /* Vérif message tooLong */
            if(strlen($message) > 750){
                $errors['message']['tooLong'] = true;
            }

            /** Si 0 erreurs dans $errors **/
            if(count($errors) === 0)
            {
                /*** New mangager ***/
                $manager = new \Manager\ContactManager();

                $usersContact = $manager->setTable('contact');

                /*** Ajout saisies au tableau data [] ***/
                $data = [
                    'name'      => $name,
                    'mail'      => $mail,
                    'message'   => $message,
                ];

                $usersContact->insert($data);
                $msgInserted = true;

                $this->show('display/contact', ['msgInserted' => $msgInserted]);
            }
        
            /** Sinon ... **/
            else
            {
                $mangager = new \Manager\ContactManager();
                $this->show('display/contact', ['errors' => $errors]);
            }

        } 

        else{
            
            $manager =  new \Manager\ContactManager();
            $this->show('display/contact');
        }
    }
}