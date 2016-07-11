<?php
	
	$w_routes = array(
		['GET', '/', 'Display#listing', 'home'],	
		['GET|POST', '/loginPage/signup',   'LoginPage#login',          'login'],
		['GET|POST', '/loginPage/connect',   'LoginPage#connect',        'connect'],
	);