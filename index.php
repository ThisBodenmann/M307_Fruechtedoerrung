<?php
require 'core/bootstrap.php';

$routes = [
	'/create' => 'CreateController@index'
];

$db = [
	'name'     => 'meinedatenbank',
	'username' => 'root',
	'password' => '',
];

$router = new Router($routes);
$router->run($_GET['url'] ?? '');