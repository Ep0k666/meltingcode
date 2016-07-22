<?php

$w_routes = array(
    /*************** ---------- HOME ------------ ******************/
    ['GET|POST',     '/', 					'Display#listing',              'home'],
    /************** ---------- ACTIVITY ------------ ***************/
    ['GET|POST',     '/activity/[:id]',             'Display#shopActivity',             'activity'],
    /************** ---------- SEARCH ------------ ***************/
    ['GET|POST', 	'/search', 				'Display#search', 				'search'],
    /************** ---------- CONTACT ------------ ***************/
    ['GET|POST', 	 '/contact', 			'Contact#contact',				'contact'],
    /************** ---------- NEWSLETTER ------------ ***************/
    ['GET|POST',     '/newsletter',            'Newsletter#subscribeNewsletter',              'newsletter'],
    /*************** ---------- account ------------ ******************/
    ['GET|POST',     '/account[:id]/', 'Connect#account', 'id'],
    /************** ---------- LOGIN ------------ ***************/
    ['GET|POST',     '/signup', 'Connect#login', 'login'],
    /************** ---------- CONNECT ------------ ***************/
    ['GET|POST',     '/connect', 'Connect#connexion', 'connexion'],
    /*************** ---------- LOGOFF ------------ ******************/
    ['GET|POST',     '/disconnect', 'Connect#logoff', 'logoff'],

    /*************** ---------- ADMIN BOUTIQ ------------ ******************/
    ['GET|POST',     '/admin', 'Display#adminHome', 'admin-home'],
    /*************** ---------- Ajout ------------ ******************/
    ['GET|POST',     '/shops', 'Shop#shopListCategory', 'add-shop'],
    /*************** ---------- Edition ------------ ******************/
    ['GET|POST',     '/shops/edit/[:id]', 'Shop#shopEdit', 'edit-shop'],
    /*************** ---------- Suppression ------------ ******************/
    ['GET|POST',     '/shops/delete/[:id]', 'Shop#delete', 'delete-shop'],
    /*************** ---------- Vue ------------ ******************/
    ['GET|POST', '/shops/shopview/[:id]', 'Shop#shopview', 'shop-view'],
      /*************** ---------- A PROPOS ------------ ******************/
    ['GET|POST',     '/apropos', 'Display#aPropos', 'a-propos'],
);