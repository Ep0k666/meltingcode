<?php

namespace Manager;

class UserManager extends \W\Manager\UserManager
{

    public function __construct()
    {
        parent::__construct();
        $this->setTable('user');
    }

    /**
     * Retourne l'ID d'un utilisateur en fonction de son mail
     * @param   $pdo Connexion PDO à la DB
     * @param   $mail Le mail
     * @return  int : L'ID de l'utilisateur
     */
    public function getIdForMail($mail) {
        $pdo= $this->dbh;
        $sql = 'SELECT id FROM ' . $this->getTable() . ' WHERE email LIKE :email LIMIT 1';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email', $mail);
        $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        $idUser = $result['id'];
        return (int) $idUser;
        /* Cast facultatif */
    }

    /**
     * Retourne l'ID d'un utilisateur, en fonction du token enregistré en base
     * @param   $pdo Connexion PDO à la DB
     * @param   $token Le token créé pour l'utilisateur
     * @return  int | false : L'ID de l'utilisateur ou false si aucun utilisateur n'a été trouvé
     */
    function getUserIdByToken ($token) {
        $pdo= $this->dbh;
        $sql = 'SELECT id_user FROM '. $this->getTable() .' WHERE token LIKE :token LIMIT 1';
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

    public function updateUserPassword( $uId, $newPass) {
        $pdo= $this->dbh;
        $sql = 'UPDATE user SET password = :password WHERE id = :uid;';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':uid', $uId);
        $stmt->bindValue(':password', $newPass);
        $stmt->execute();}

    public function find($id)
    {
        if (!is_numeric($id)){
            return false;
        }

        $sql = "SELECT * FROM " . $this->table . " WHERE $this->primaryKey = :id LIMIT 1";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":id", $id);
        $sth->execute();

        return $sth->fetch();}

}
