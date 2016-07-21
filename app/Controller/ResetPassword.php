<?php

/**
 * Vérifie si le mail entré existe en base de données
 * @param   $pdo Connexion PDO à la DB
 * @param   $mail Email
 * @return bool : true si le mail correspond à un utilisateur
 */
function userMailExists($pdo, $mail) {

    $sql = 'SELECT COUNT(mail) AS nbMail FROM Users WHERE mail LIKE :mail;';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':mail', $mail);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    /* Un fetch simple suffit, on attend qu'une ligne */

    if ($result['nbMail'] > 0) { /* COUNT(mail) > 0 */
        return true;   /* On retourne vrai */
    }
    return false;
    /*
      Pas besoin de `else`, puisque si on arrive ici, c'est que le
      `return true` du dessus n'a pas été interprété
     */
}

/**
 * Retourne l'ID d'un utilisateur en fonction de son mail
 * @param   $pdo Connexion PDO à la DB
 * @param   $mail Le mail
 * @return 	int : L'ID de l'utilisateur
 */
function getIdForMail($pdo, $mail) {
    $sql = 'SELECT id FROM Users WHERE mail LIKE :mail LIMIT 1';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':mail', $mail);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $idUser = $result['id'];
    return (int) $idUser;
    /* Cast facultatif */
}

/**
 * Mise à jour du mot de passe d'un utilisateur
 * @param   $pdo Connexion PDO à la DB
 * @param   $uid ID de l'utilisateur à modifier
 * @param   $newPass Nouveau mot de passe en clair
 */
function updateUserPassword($pdo, $uId, $newPass) {
    $sql = 'UPDATE Users SET password = :password WHERE id = :uid;';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':uid', $uId);
    $stmt->bindValue(':password', $newPass);
    $stmt->execute();
}


function envoiMail($userMail, $token){

    $mail = new PHPMailer();

    $mail->isSMTP();                                        // On va se servir de SMTP
    $mail->Host = 'smtp.gmail.com';                 // Serveur SMTP
    $mail->SMTPAuth = true;                                 // Active l'autentification SMTP
    $mail->Username = 'mail.wf3@gmail.com';                 // SMTP username
    $mail->Password = 'mailwf3741';                         // SMTP password
    $mail->SMTPSecure = 'tls';                              // TLS Mode
    $mail->Port = 587;                                      // Port TCP à utiliser

    $mail->Sender='mailer@monsite.fr';
    $mail->setFrom('mailer@monsite.fr', 'Mon programme PHP', false);
    $mail->addAddress($userMail, 'Marielle');          // Ajouter un destinataire
    $mail->addAddress('ellen@example.com');                 // Le nom est optionnel
    $mail->addReplyTo('contact@monsite.fr', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    $mail->isHTML(true);                                     // Set email format to HTML

    $mail->Subject = 'Nouveau mot de passe';
    $mail->Body    = 'Message au format html : <h1>Nouveau mot de passe</h1> <p> <a href="http://localhost/password/lost-pass/reset-password.php?tk="> Mot de passe </a> </p>';
    $mail->AltBody = 'Le message en texte brut, pour les clients qui ont désactivé l\'affichage HTML';

    if(!$mail->send()) {
        echo 'Le message n\'a pas pu être envoyé <br/>';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Le message a été envoyé <br/>';
    }

}
