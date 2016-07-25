<?php

namespace Manager;
use W\Manager\Manager;

class RecoverytokenManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
        $this->setPrimaryKey('id_user');
    }

    /**
     * Indique si un utilisateur a déjà généré un token de réinitialisation
     * @param $pdo Connexion à la base de données
     * @param $uId ID de l'utilisateur
     * @return bool
     */
    public function tokenExistsForUser($uId){
        $pdo= $this->dbh;
        $sql = 'SELECT COUNT(*) FROM ' . $this->getTable() . ' WHERE id_user=:id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $uId, \PDO::PARAM_INT);
        $stmt->execute();
        return ($stmt->fetchColumn(0) > 0);
    }



    /**
     * Retourne l'ID d'un utilisateur, en fonction du token enregistré en base
     * @param   $pdo Connexion PDO à la DB
     * @param   $token Le token créé pour l'utilisateur
     * @return  int | false : L'ID de l'utilisateur ou false si aucun utilisateur n'a été trouvé
     */
    public function getUserIdByToken($token) {
        $pdo= $this->dbh;
        $sql = 'SELECT id_user FROM ' . $this->getTable() . ' WHERE token LIKE :token LIMIT 1';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':token', $token);
        $stmt->execute();

        $result = $stmt->fetch();
        $idUser = $result['id_user'];
        if ($idUser) {
            return (int) $idUser;
        }
        return false;
        /* Cast facultatif */
    }

    /**
     * Supprimer le token pour un utilisateur
     * @param   $pdo Connexion PDO à la DB
     * @param   $id L'ID de l'utilisateur
     */
    public function deleteTokenForUser($uId) {
        $pdo= $this->dbh;
        $sql = 'DELETE FROM ' . $this->getTable() . ' WHERE id_user LIKE :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $uId);
        $stmt->execute();
    }


}