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
    ['GET|POST',     '/newsletter',            'Newsletter#newsletter',              'newsletter'],
    /************** ---------- A PROPOS ------------ ***************/
    ['GET|POST',     '/apropos',            'Display#aPropos',              'a-propos'],
    /*************** ---------- account ------------ ******************/
    ['GET|POST', '/account[:id]/', 'User#UpdateUser', 'account'],
    /************** ---------- LOGIN ------------ ***************/
    ['GET|POST',     '/signup', 'Connect#login', 'login'],
     /************** ---------- LOST ------------ ***************/
    ['GET|POST', '/lost/', 'ResetPass#lostPassword', 'lost'],

    /************** ---------- RESET ------------ ***************/
    ['GET|POST', '/reset/[:tk]', 'ResetPass#resetPassword', 'reset'],

    /************** ---------- CONNECT ------------ ***************/
    ['GET|POST',     '/connect', 'Connect#connexion', 'connexion'],
    /*************** ---------- LOGOFF ------------ ******************/
    ['GET|POST',     '/disconnect', 'Connect#logoff', 'logoff'],
    /*************** ---------- ADMIN BOUTIQ HOME ------------ ******************/
    /*************** ---------- Admin ------------ ******************/
    ['GET|POST', '/shops/admin/[:id]', 'Shop#adminShop', 'admin-shop'],
    /*************** ---------- Ajout ------------ ******************/
    ['GET|POST',     '/shops/add', 'Shop#shopListCategory', 'add-shop'],
    /*************** ---------- Edition ------------ ******************/
    ['GET|POST',     '/shops/edit/[:id]', 'Shop#shopEdit', 'edit-shop'],
    /*************** ---------- Suppression ------------ ******************/
    ['GET|POST',     '/shops/delete/[:id]', 'Shop#delete', 'delete-shop'],
    /*************** ---------- Vue ------------ ******************/
    ['GET|POST', '/shops/shopview/[:id]', 'Shop#shopview', 'shop-view'],
    /*************** ---------- AJAX ROAD ------------ ******************/
    ['GET|POST', '/ajax/path/create', 'AjaxPath#add', 'ajax_path_create'],
);