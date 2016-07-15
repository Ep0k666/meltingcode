<?php

namespace Manager;


class ShopManager extends \W\Manager\Manager
{

    /*créer un categoryManager à part */
    public function getAllcategories()
    {
        $sql = 'SELECT DISTINCT category FROM shops ORDER BY category';
        $stmt=$this->dbh->query($sql);
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
     * Shops par activité
     ***/
    public function getShopByActivity()
    {
        $sql = 'SELECT * FROM shops ORDER BY category';
        $stmt = $this->dbh->query($sql);
        return $stmt->fetchAll();
    }

    /***
     * Fonction pour page "home"
     * Products par category
     ***/
    public function getProductsByCategory()
    {
        $sql = 'SELECT * FROM products ORDER BY category';
        $stmt = $this->dbh->query($sql);
        return $stmt->fetchAll();
    }
}
