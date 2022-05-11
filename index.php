<?php
require 'core/bootstrap.php';

$routes = [
	'/main' => 'MainController@index',
	'/create' => 'CreateController@index',
	'/edit' => 'EditController@index'
];

$db = [
	'name'     => 'kurseictbz_30706',
	'username' => 'kurseictbz_30706',
	'password' => 'db_307_pw_06',
];

$router = new Router($routes);
$router->run($_GET['url'] ?? '');