<?php
	
	$w_routes = array(
        ['GET',          '/',                     'Display#home',               'home'],
		['GET|POST', 	'/loginPage/signup',      'LoginPage#login',            'login'],
		['GET|POST',    '/loginPage/connect',     'Connect#Connect',           'connect'],
		['GET|POST',     '/login/disconnect', 	  'LoginPage#logoff', 		   'logoff'],
	);