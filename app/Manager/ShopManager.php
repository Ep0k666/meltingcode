<?php

namespace Manager;

// Le nom de la table en base de donnees doit etre shops
class ShopManager extends \W\Manager\Manager 
{
    public function mostViewed()
    {
    	$sql = 'SELECT * FROM shops ORDER BY number_view DESC LIMIT 4';
    	$stmt = $this->dbh->query($sql);
    	return $stmt->fetchAll();
    }

    public function mostRecent()
    {
    	$sql = 'SELECT * FROM shops ORDER BY date_adding DESC LIMIT 6';
    	$stmt = $this->dbh->query($sql);
    	return $stmt->fetchAll();
    }
}