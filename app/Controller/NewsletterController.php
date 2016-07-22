<?php

namespace Controller;

use \W\Controller\Controller;

class NewsletterController extends Controller
{

    public function subscribeNewsletter()
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

            // Déclaration infoInserted
            $infoInserted = false;

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

            $manager = new \Manager\NewsletterManager();

            if($manager->emailExists($mail)){
                $errors['mail']['exist'] = true;
            }

            // Si aucune erreurs dans le tableau $errors
            if(count($errors) === 0){

                $users = $firstname . $lastname;
                $subject = 'Inscription newsletter';
                $content = 'Bonjour '.$firstname.'<br />
                Nous avons la joie de vous informer que vous êtes désormais abonné à notre newsletter';

                $this->sendNews($users, $subject, $content);

                // Déclaration de data []
                $data = [
                'lastname'  => $lastname,
                'firstname' => $firstname,
                'age'       => $age,
                'mail'     => $mail,
                'gender'    => $gender,
                ];

                $manager->insert($data);
                $infoInserted = true;
                $this->show('display/newsletter', ['infoInserted' => $infoInserted]);

            } 

            // S'il y des erreurs je renvoi sur newsletter avec $errors[]
            else{
                $this->show('display/newsletter',['errors' => $errors]);
            }
        }

        else{
            $this->show('display/newsletter');
        }
    }
    

    public function sendNews($users, $subject, $content)
    {
        $mail = new \PHPMailer();

        $mail->isSMTP();                                        // On va se servir de SMTP
        $mail->Host = 'smtp.gmail.com';                 // Serveur SMTP
        $mail->SMTPAuth = true;                                 // Active l'autentification SMTP
        $mail->Username = 'lor.n.shops@gmail.com';                 // SMTP username
        $mail->Password = '1connardentongs%';                         // SMTP password
        $mail->SMTPSecure = 'tls';                              // TLS Mode
        $mail->Port = 587;                                      // Port TCP à utiliser

        // Username, sender et setform doivent être identiques pour Gmail

        $mail->Sender='lor.n.shops@gmail.com';
        $mail->setFrom('lor.n.shops@gmail.com', $subject, false);       
        // Ajouter un destinataire
        // Boucle foreach pour chaque user
        $mail->addAddress('steven54.perini@gmail.com');                 // Le nom est optionnel
        $mail->addReplyTo('steven54.perini@gmail.com', 'Steven');
        $mail->isHTML(true);                                     // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $content;
        $mail->AltBody = $content;

        $mail->send();
    }
}