<?php

require 'vendor/autoload.php';

$twigView = new \Slim\Extras\Views\Twig();

$app = new \Slim\Slim(array(
		'view' => $twigView,
		'debug' => true,
		'templates.path' => 'templates/',
	));

// $app->add(new \Slim\Extras\Middleware\HttpBasicAuth('username', 'password'));

$app->get('/report', function() use ($app)
	{
		require_once 'models/hours.php';
		$hourModel = new Hours();
		$hours = $hourModel->returnHours();
		//var_dump($hours);
		$app->render('hours_list.twig', array('hours' => $hours));
	});

$app->get('/', function()
	{
		echo "Index";
	});

$app->run();
?>
