<?php

require '../vendor/autoload.php';
require '../class/config.php';

$twigView = new \Slim\Extras\Views\Twig();

$app = new \Slim\Slim(array(
		'view' => $twigView,
		'debug' => true,
		'templates.path' => '../templates/',
	));

$app->get('/(:controller(/:method(/:args+)))', function($controller = 'home', $method = 'index', $args = array()) use ($app)
	{
	$request = $app->request();
		if (file_exists('../controller/' . $controller . '.php'))
		{
			require_once '../controller/' . $controller . '.php';
			$className = $controller.'Controller';
			$controllerObj = new $className($app, $request); // instantiate class
			$controllerObj->controller = $controller;
			$controllerObj->method = $method; // set controller/method vars
			$controllerObj->callMethod($controllerObj->method, $args);
		}
		else
		{
			$app->halt(404, 'You shall not pass!');
		}
	})->via('GET', 'POST');


$app->run();
?>
