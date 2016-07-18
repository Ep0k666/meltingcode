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
    /*************** ---------- HOME ------------ ******************/
    ['GET|POST', '/account', 'LoginPage#account', 'id'],
    /************** ---------- LOGIN ------------ ***************/
    ['GET|POST', '/signup', 'LoginPage#login', 'login'],
    /************** ---------- CONNECT ------------ ***************/
    ['GET|POST', '/connect', 'Connect#connexion', 'connexion'],
    /*************** ---------- LOGOFF ------------ ******************/
    ['GET|POST', '/login/disconnect', 'LoginPage#logoff', 'logoff'],
    /*************** ---------- ADMIN BOUTIQ ------------ ******************/
    ['GET|POST', '/shops', 'Shop#shopListCategory', 'add-shop'],
);