<?php

namespace Manager;

class ConnectManager extends \W\Security\AuthentificationManager
{

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
     * Ajoute un token de réinitialisation de mot de passe
     * en base de données
     * @param   $pdo Connexion PDO à la DB
     * @param   $uId ID de l'utilisateur
     * @param   $token Token à créer
     */
    function insertToken($pdo, $uId, $token) {

        $sql = 'INSERT INTO recoveryTokens (id_user, token) VALUES(:id_user, :token);';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id_user', $uId, \PDO::PARAM_INT);
        $stmt->bindValue(':token', $token);
        $stmt->execute();
    }

    /**
     * Ajoute un token pour un utilisateur (remplace l'ancien s'il en existe un)
     * @param $pdo Connexion à la base de données
     * @param $uId ID de l'utilisateur
     * @param $token Token de réinitialisation
     */
    function insertTokenReplaceOld($pdo, $uId, $token) {
        if(tokenExistsForUser($pdo, $uId)) {
            deleteTokenForUser($pdo, $uId);
        }
        insertToken($pdo, $uId, $token);
    }

    /**
     * Ajoute un token pour un utilisateur (remplace l'ancien s'il en existe un)
     * @param $pdo Connexion à la base de données
     * @param $uId ID de l'utilisateur
     * @param $token Token de réinitialisation
     */
    function insertTokenReplaceOld2($pdo, $uId, $token) {
        // Autre syntaxe, en une seule requete
        $sql = 'INSERT INTO recoveryTokens (id_user, token) VALUES (:id, :token) '.
            'ON DUPLICATE KEY UPDATE token = :token2;';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $uId, \PDO::PARAM_INT);
        $stmt->bindValue(':token', $token);
        $stmt->bindValue(':token2', $token);
        $stmt->execute();
    }

    /**
     * Indique si un utilisateur a déjà généré un token de réinitialisation
     * @param $pdo Connexion à la base de données
     * @param $uId ID de l'utilisateur
     * @return bool
     */
    function tokenExistsForUser($pdo, $uId) {
        $sql = 'SELECT COUNT(*) FROM recoveryTokens WHERE id_user=:id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $uId, \PDO::PARAM_INT);
        $stmt->execute();
        return ($stmt->fetchColumn(0) > 0);
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
     * Retourne l'ID d'un utilisateur, en fonction du token enregistré en base
     * @param   $pdo Connexion PDO à la DB
     * @param   $token Le token créé pour l'utilisateur
     * @return 	int | false : L'ID de l'utilisateur ou false si aucun utilisateur n'a été trouvé
     */
    function getUserIdByToken($pdo, $token) {
        $sql = 'SELECT id_user FROM recoveryTokens WHERE token LIKE :token LIMIT 1';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':token', $token);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $idUser = $result['id_user'];
        if ($idUser) {
            return (int) $idUser;
        }
        return false;
        /* Cast facultatif */
    }

    /**
     * Quitte le script et redirige vers l'accueil
     */
    function goIndex() {

        $this->redirectToRoute('connexion');
        exit;
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

    /**
     * Supprimer le token passé en paramètre
     * @param   $pdo Connexion PDO à la DB
     * @param   $token Le token à supprimer
     */
    function deleteToken($pdo, $token) {
        $sql = 'DELETE FROM recoveryTokens WHERE token LIKE :token';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':token', $token);
        $stmt->execute();
    }

    /**
     * Supprimer le token pour un utilisateur
     * @param   $pdo Connexion PDO à la DB
     * @param   $id L'ID de l'utilisateur
     */
    function deleteTokenForUser($pdo, $uId) {
        $sql = 'DELETE FROM recoveryTokens WHERE id_user LIKE :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $uId);
        $stmt->execute();
    }


}
