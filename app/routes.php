<?php

$w_routes = array(
    ['GET', '/display', 'Display#home', 'home'],
    ['GET|POST', '/signup', 'LoginPage#login', 'login'],
    ['GET|POST', '/loginPage', 'LoginPage#listing', 'id'],
    ['GET|POST', '/connect', 'Connect#connexion', 'connexion'],
    ['GET|POST', '/shops', 'Shop#shopListCategory', 'add-shop'],
    ['GET|POST', '/login/disconnect', 'LoginPage#logoff', 'logoff'],
);