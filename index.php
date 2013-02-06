<?php

require 'vendor/autoload.php';

$twigView = new \Slim\Extras\Views\Twig();

$app = new \Slim\Slim(array(
		'view' => $twigView,
		'debug' => true,
		'templates.path' => 'templates/',
	));


$app->get('/(:controller(/:method(/:args+)))', function($controller = 'home', $method = 'index', $args = array()) use ($app)
	{
		if (file_exists('controller/' . $controller . '.php'))
		{
			require_once 'controller/' . $controller . '.php';
			$controllerObj = new $controller($app);
			$controllerObj->controller = $controller;
			$controllerObj->method = $method;
			//$controllerObj->initView();
			$controllerObj->callMethod($controllerObj->method, $args);
		}
		else
		{
			$app->halt(404, 'You shall not pass!');
		}
	});


$app->run();
?>
