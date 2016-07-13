<?php

$w_routes = array(
    ['GET', '/display', 'Display#home', 'home'],
    ['GET|POST', '/loginPage/signup', 'LoginPage#login', 'login'],
    ['GET|POST', '/loginPage/[:id]', 'LoginPage#listing', 'id'],
    ['GET|POST', '/loginPage/connect', 'Connect#connexion', 'connexion'],
    ['GET|POST', '/login/disconnect', 'LoginPage#logoff', 'logoff'],
);