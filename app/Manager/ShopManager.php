<?php

namespace Manager;


class ShopManager extends \W\Manager\Manager
{

    /***
     * Fonction pour page "addshop"
     * Affiche la liste des catégories dans la balise select
     ***/
    public function getAllcategories()
    {
        $sql = 'SELECT * FROM categoryshops ORDER BY category';
        $stmt=$this->dbh->query($sql);
        return $stmt->fetchAll();
    }

    
     /***
     * Fonction pour page "adminshop"
     * Affiche la liste des shops en foncton du user connecté
     ***/
    public function getShopsUser($id)
    {
        $sql = 'SELECT * FROM shops WHERE id_user = :id';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
       /***
     * Fonction pour page "home"
     * Shops les plus consultées
     ***/
    public function mostViewed()
    {
        $sql = 'SELECT * FROM shops ORDER BY number_view DESC LIMIT 4';
        $stmt = $this->dbh->query($sql);
        return $stmt->fetchAll();
    }

    /***
     * Fonction pour page "home"
     * Shops les plus récents
     ***/
    public function mostRecent()
    {
        $sql = 'SELECT * FROM shops ORDER BY date_adding DESC LIMIT 6';
        $stmt = $this->dbh->query($sql);
        return $stmt->fetchAll();
    }

    /***
     * Fonction pour page "home" 
     * Return Shop category
     ***/
    public function getAllActivities()
    {
        $sql = 'SELECT * FROM categoryshops ORDER BY category ASC';
        $stmt = $this->dbh->query($sql);
        return $stmt->fetchAll();
    }

    /***
     * Fonction pour page "home" 
     * Return Shop par l'activité
     ***/
    public function getShopByActivity($id)
    {
        $sql = 'SELECT * FROM shops WHERE id_category = :id';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /***
     * Fonction pour page "home" 
     * Return Shop par l'activité
     ***/
    public function getCategorySearch($id)
    {
        $sql = 'SELECT * FROM categoryshops WHERE id_catshops = :id';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
}
