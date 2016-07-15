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
    	$sql = 'SELECT * FROM shops WHERE description LIKE "%' . $tagSearch . '%";';
    	$stmt = $this->dbh->query($sql);
    	return $stmt->fetchAll();
    }

    /***
     * Fonction pour page "search" 
     * Récupération des "products" contenant le tag dans leur description 
     ***/
    public function searchProduct($tagSearch)
    {
    	$sql = 'SELECT * FROM products WHERE description LIKE "%' . $tagSearch . '%";';
    	$stmt = $this->dbh->query($sql);
    	return $stmt->fetchAll();
    }
}