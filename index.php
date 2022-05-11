<?php
require 'core/bootstrap.php';

$routes = [
	'/main' => 'MainController@index',
	'/create' => 'CreateController@index',
	'/edit' => 'EditController@index',
	'/delete' => 'EditController@delete'
];

$db = [
	'name'     => 'ictkursm307',
	'username' => 'root',
	'password' => '',
];

$router = new Router($routes);
$router->run($_GET['url'] ?? '');