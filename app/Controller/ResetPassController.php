<?php

namespace Controller;

use \W\Controller\Controller;



class ResetPassController extends Controller
{

    public function lostPassword()
    {
        $displayMessage = false;

        if (isset($_POST['reset-pass']) && !empty($_POST['mail'])) {
            /* Si on a cliqué sur le submit && que le champ `mail` contient une saisie utilisateur */
            /* On teste l'existence du mail en base de données */
            /* Ici, on pourrait faire une validation de $_POST['mail'] pour s'assurer
              que le mail soit valide avant de tester son existence en DB */

            $userManager = new \Manager\UserManager();
            $mailExists = $userManager->emailExists($_POST['mail']);


            if ($mailExists) {
                $token = \W\Security\StringUtils::randomString(32);
                $uId = $userManager->getIdForMail($_POST['mail']); /* On aurait pu tout placer dans une fonction getUserForMail() et tester si un utilisateur est renvoyé pour un mail */

                $this->insertTokenReplaceOld($uId, $token);
                // Envoi du mail
                $this->sendRecoveryLink($_POST['mail'], $token);
            }
        }

        $this->show('loginPage/lostPass');
    }

    private function insertTokenReplaceOld($uId, $token)
    {
        $recoveryTokenManager = new \Manager\RecoveryTokenManager();
        if($recoveryTokenManager->tokenExistsForUser($uId)) {
            $recoveryTokenManager->deleteTokenForUser($uId);
        }
        $recoveryTokenManager->insert(['id_user' => $uId, 'token' => $token]);
    }

    public function sendRecoveryLink($mail, $token)
    {
        $mailer = new \PHPMailer();

        $mailer->isSMTP();                                          // On va se servir de SMTP
        $mailer->Host = 'smtp.gmail.com';                       // Serveur SMTP
        $mailer->SMTPAuth = true;                                   // Active l'autentification SMTP
        $mailer->Username = 'lor.n.shops@gmail.com';               // SMTP username
        $mailer->Password = '1esquimauentongs%';                           // SMTP password
        $mailer->SMTPSecure = 'tls';                                // TLS Mode
        $mailer->Port = 587;                                        // Port TCP à utiliser

        $mailer->Sender='lor.n.shops@gmail.com';
        $mailer->setFrom('lor.n.shops@gmail.com', 'Mon programme PHP', false);
        $mailer->addAddress($mail, 'Joe User');    // Ajouter un destinataire

        $mailer->isHTML(true);                                       // Set email format to HTML

        $mailer->Subject = 'Sujet de l\'email';
        $mailer->Body    = 'Message au format html : <a href="'.$this->show('loginPage/resetPass', ['tk' => $token]).'">Bonjour</a>';
        $mailer->AltBody = 'Le message en texte brut, pour les clients qui ont désactivé l\'affichage HTML';

        $mailer->send();

        $_SESSION['flash'] = 'Un lien de reset ..';
    }


    public function resetPassword($token)
    {

        if (isset($_POST['change_password'])) {

            $usersModel = new \Manager\RecoverytokenManager();
            $userId = $usersModel->getUserIdByToken($_GET['tk']);
            if ($userId === false) {
                /* Si ce token n'a jamais été émis, on redirige */
                $this->redirectToRoute('connexion');
            }
//        $this->show('', ['passUpdated' => true]);
            $this->show('/loginPage/resetPass');
        }
    }

}