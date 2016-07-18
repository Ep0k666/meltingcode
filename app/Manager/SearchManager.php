<?php

namespace Manager;

class SearchManager extends \W\Manager\Manager 
{
    /***
     * Fonction pour page "search" 
     * Récupération des "shops" contenant le tag dans leur description 
     ***/
    public function searchShop($tagSearch)
    {
        $sql = 'SELECT * FROM shops 
                WHERE description LIKE "%' . $tagSearch . '%" 
                OR name LIKE "%' . $tagSearch . '%"
                OR city LIKE "%' . $tagSearch . '%";';
        $stmt = $this->dbh->query($sql);
        return $stmt->fetchAll();
    }
}