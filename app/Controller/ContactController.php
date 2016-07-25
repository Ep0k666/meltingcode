<?php

namespace Controller;

use \W\Controller\Controller;

class ContactController extends Controller
{

    /***
     * Fonction pour page "contact"
     * Récupération du message et des infos users
     * Gestion des erreurs de saisies => $errors []
     * Enregistrement en DB 
     ***/
    public function contact()
    {

        /*** A la soumission duformulaire ***/
        if(isset($_POST['send-message'])){

            /*** Récupération et nettoyage des saisies ***/
            $name = trim(htmlspecialchars($_POST['name']));
            $mail = trim(htmlspecialchars($_POST['mail']));
            $message = trim(htmlspecialchars($_POST['message']));
            
            /** Déclaration tableau erreurs **/
            $errors = [];

            /**  Var vérification enregistrement message **/
            $msgInserted = false;

            /**************
                  NAME
             **************/

            /* Vérif name integer */
            if(filter_var($name, FILTER_VALIDATE_INT))
            {
                $errors['name']['int'] = '
                    <p class="errors">Le nom ne peut pas contenir de chiffres</p>';
            }

            /* Vérif name tooShort */
            if(strlen($name) < 3)
            {
                $errors['name']['tooShort'] = '
                    <p class="errors">Le nom doit contenir au moins 3 caractères</p>';
            }

            /* Vérif name tooLong */
            if(strlen($name) > 50)
            {
                $errors['name']['tooLong'] = '
                    <p class="errors">Le nom ne peut pas contenir plus de 100 caractères</p>';
            }

            /**************
                  EMAIL
             **************/

            /* Vérif mail format mail */
            if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
            {
                $errors['mail']['format'] = '
                    <p class="errors">Le mail doit avoir ce format : adresse@mail.com</p>';
            }

            /* Vérif name tooShort */
            if(strlen($mail) < 8)
            {
                $errors['mail']['tooShort'] = '
                    <p class="errors">Le mail doit contenir au moins 8 caractères</p>';
            }

            /* Vérif mail tooLong */
            if(strlen($mail) > 50)
            {
                $errors['mail']['tooLong'] = '
                    <p class="errors">Le mail ne peut pas contenir plus de 50 caractères</p>';
            }

            /**************
                MESSAGE
             **************/

            /* Vérif message tooShort */
            if(strlen($message) < 20)
            {
                $errors['message']['tooShort'] = '
                    <p class="errors">Le message doit contenir au moins 20 caractères</p>';
            }

            /* Vérif message tooLong */
            if(strlen($message) > 750)
            {
                $errors['message']['tooLong'] = '
                    <p class="errors">Le message ne peut pas contenir plus de 750 caractères</p>';
            }

            /** Si 0 erreurs dans $errors **/
            if(count($errors) === 0)
            {
                /*** Contact Manager ***/
                $manager = new \Manager\ContactManager();

                /*** Set Table 'contact' **/
                $usersContact = $manager->setTable('contact');

                /*** Ajout saisies au tableau data [] ***/
                $data = [
                    'name'      => $name,
                    'mail'      => $mail,
                    'message'   => $message,
                ];

                /*** Insertion en DB ***/
                $usersContact->insert($data);

                /*** Enregistrement message => true ***/
                $msgInserted = true;

                /*** Show to template 'contact' ***/
                $this->show('display/contact', ['msgInserted' => $msgInserted]);
            }
        
            /** Si les champs comportent des erreurs **/
            else
            {
                /*** Contact Manager ***/
                $mangager = new \Manager\ContactManager();

                /*** Show to template 'contact' ***/
                $this->show('display/contact', ['errors' => $errors]);
            }

        } 

        /*** Si le formulaire n'a pas été soumi ***/
        else{
            
            /*** Contact Manager ***/
            $manager =  new \Manager\ContactManager();

            /*** Show to template 'contact' ***/
            $this->show('display/contact');
        }
    }
}