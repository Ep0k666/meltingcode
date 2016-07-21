<?php

namespace Controller;

use \W\Controller\Controller;

class ConnectController extends Controller
{
    public function connexion()
    {


        if (isset($_POST['connect'])) {

            $errors = [];
            if (empty($_POST['email'])) {
                $errors['email']['empty'] = 'true';

            }
            if (empty($_POST['password'])) {
                $errors['password']['empty'] = true;
            }
            if (count($errors) === 0) {

                $userManager = new \Manager\UserManager();

                // Creation du Manager
                $authentificationManager = new \W\Security\AuthentificationManager();
                $id = $authentificationManager->isValidLoginInfo($_POST['email'], $_POST['password']);

                // Si la connexion a reussi
                if ($id) {
                    $userInfos = $userManager->find($id);
                    $authentificationManager->logUserIn($userInfos);
                    $this->redirectToRoute('home');
                } else {
                    echo 'La Connexion à échoué';
                    // Redirection vers le login
                    $this->show('connexion', ['errors' => $errors]);
                }

            }

        }

        $this->show('/loginPage/connect');
    }

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
                $this->redirectToRoute('connexion');
            }
        }
        $this->show('/loginPage/signup');

    }

    public function account()
    {
        $this->allowTo(['editeur']);

        /* $data = [
             'login' => htmlspecialchars($_POST['login'], FILTER_SANITIZE_FULL_SPECIAL_CHARS),
             'password' => htmlspecialchars(password_hash($_POST['pass1'], PASSWORD_DEFAULT)),
             'firstname' => htmlentities($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS),
             'company' => htmlspecialchars($_POST['company'], FILTER_SANITIZE_FULL_SPECIAL_CHARS),
             'lastname' => htmlspecialchars($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS),
             'email' => filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL),
             'role' => 'editeur',
         ];

         if (!is_numeric($id)){
             return false;
         }

         $sql = "UPDATE " . $this->('users') . " SET ";
         foreach($data as $key => $value){
             $sql .= "$key = :$key, ";
         }
         $sql = substr($sql, 0, -2);
         $sql .= " WHERE $this->primaryKey = :id";

         $sth = $this->dbh->prepare($sql);
         foreach($data as $key => $value){
             $value = ($stripTags) ? strip_tags($value) : $value;
             $sth->bindValue(":".$key, $value);
         }
         $sth->bindValue(":id", $id);

         if (!$sth->execute()){
             return false;
         }
         return $this->find($id);*/

        $this->show('/loginPage/loginPage');
    }

    public function logoff()
    {

        $authentificationManager = new \W\Security\AuthentificationManager();
        $authentificationManager->logUserOut();
        $this->redirectToRoute('connexion');

    }

    public function resetPassW($users, $message)
    {

        $mail = new PHPMailer();

        $mail->isSMTP();                                        // On va se servir de SMTP
        $mail->Host = 'smtp.gmail.com';                 // Serveur SMTP
        $mail->SMTPAuth = true;                                 // Active l'autentification SMTP
        $mail->Username = 'mail.wf3@gmail.com';                 // SMTP username
        $mail->Password = 'mailwf3741';                         // SMTP password
        $mail->SMTPSecure = 'tls';                              // TLS Mode
        $mail->Port = 587;                                      // Port TCP à utiliser

        $mail->Sender = 'mailer@monsite.fr';          //mail de l expediteur
        $mail->setFrom('mailer@monsite.fr', 'Mon programme PHP', false);
        $mail->addAddress($users, 'Marielle');          // Ajouter un destinataire
        $mail->addAddress('ellen@example.com');                 // Le nom est optionnel
        $mail->addReplyTo('contact@monsite.fr', 'Information');


        $mail->isHTML(true);                                     // Set email format to HTML

        $mail->Subject = 'Nouveau mot de passe';
        $mail->Body = 'Message au format html : <h1>Nouveau mot de passe</h1> <p> <a href="http://localhost/password/lost-pass/reset-password.php?tk="> Mot de passe </a> </p>';
        $mail->AltBody = 'Le message en texte brut, pour les clients qui ont désactivé l\'affichage HTML';

        $mail->send();

        // username et setfrom et sender doivent etre les memes
        $this->show('/LoginPage/resetPass');
    }
}