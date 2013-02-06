<?php
require_once 'controller/controller.php';
/**
 * Description of hours
 *
 * @author Jesús Flores <jesusfloressanjose@gmail.com>
 */
class Home extends Controller
{
	public function __construct($app)
	{
		$this->app = $app;
		return;
	}

	public function index()
	{
		$this->app->render('home.twig', array());
	}
}

?>
