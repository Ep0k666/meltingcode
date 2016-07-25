<?php

$w_routes = array(

    /*************** ---------- HOME ------------ ******************/
    ['GET|POST', '/', 'Display#listing', 'home'],

    /************** ---------- ACTIVITY ------------ ***************/
    ['GET|POST', '/activity/[:id]', 'Display#shopActivity', 'activity'],

    /************** ---------- SEARCH ------------ ***************/
    ['GET|POST', '/search', 'Display#search', 'search'],

    /************** ---------- DETAILED SEARCH ------------ ***************/
    ['GET|POST', '/detailed-search', 'Display#detailedSearch', 'detailed-search'],

    /************** ---------- CONTACT ------------ ***************/
    ['GET|POST', '/contact', 'Contact#contact', 'contact'],

    /************** ---------- NEWSLETTER ------------ ***************/
    ['GET|POST', '/newsletter', 'Newsletter#subscribeNewsletter', 'newsletter'],

    /*************** ---------- account ------------ ******************/
    ['GET|POST', '/account/[:id]', 'Connect#account', 'id'],

    /************** ---------- LOGIN ------------ ***************/
    ['GET|POST', '/inscription', 'Connect#login', 'login'],

    /************** ---------- CONNECT ------------ ***************/
    ['GET|POST', '/login', 'Connect#connexion', 'connexion'],

    /*************** ---------- LOGOFF ------------ ******************/
    ['GET|POST', '/logout', 'Connect#logoff', 'logoff'],

    /*************** ---------- ADMIN BOUTIQ ------------ ******************/
    ['GET|POST', '/shops/admin/[:id]', 'Shop#adminHome', 'admin-shop'],

    /*************** ---------- Ajout ------------ ******************/
    ['GET|POST', '/shops/adding', 'Shop#shopListCategory', 'add-shop'],

    /*************** ---------- Edition ------------ ******************/
    ['GET|POST', '/shops/edit/[:id]', 'Shop#shopEdit', 'edit-shop'],

    /*************** ---------- Suppression ------------ ******************/
    ['GET|POST', '/shops/delete/[:id]', 'Shop#delete', 'delete-shop'],

    /*************** ---------- Vue ------------ ******************/
    ['GET|POST', '/shopview/[:id]', 'Shop#shopview', 'shop-view'],

    /*************** ---------- AJAX ROAD ------------ ******************/
    ['GET|POST', '/ajax/path/create', 'AjaxPath#add', 'ajax_path_create'],
);