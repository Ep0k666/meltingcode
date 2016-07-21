<?php

$w_routes = array(
    /*************** ---------- HOME ------------ ******************/
    ['GET|POST',    '/', 					'Display#listing',              'home'],
            /************** ---------- ACTIVITY ------------ ***************/
        ['GET|POST',     '/activity/[:id]',             'Display#shopActivity',             'activity'],
    /************** ---------- SEARCH ------------ ***************/
    ['GET|POST', 	'/search', 				'Display#search', 				'search'],
    /************** ---------- CONTACT ------------ ***************/
    ['GET|POST', 	 '/contact', 			'Contact#contact',				'contact'],
    /************** ---------- NEWSLETTER ------------ ***************/
    ['GET|POST',     '/newsletter',            'Newsletter#newsletter',              'newsletter'],
    /*************** ---------- HOME ------------ ******************/
    ['GET|POST', '/loginPage/', 'LoginPage#listing', 'id'],
    /************** ---------- LOGIN ------------ ***************/
    ['GET|POST', '/signup', 'LoginPage#login', 'login'],
    /************** ---------- CONNECT ------------ ***************/
    ['GET|POST', '/connect', 'Connect#connexion', 'connexion'],
    /*************** ---------- LOGOFF ------------ ******************/
    ['GET|POST', '/login/disconnect', 'LoginPage#logoff', 'logoff'],
    /*************** ---------- ADMIN BOUTIQ ------------ ******************/
    ['GET|POST', '/shops', 'Shop#shopListCategory', 'add-shop'],
    /*************** ---------- ADMIN BOUTIQ HOME ------------ ******************/
    ['GET|POST', '/admin', 'Display#adminHome', 'admin-home'],
);