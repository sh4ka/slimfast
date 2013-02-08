<?php
require_once '../controller/controller.php';
/**
 * Description of hours
 *
 * @author Jesús Flores <jesusfloressanjose@gmail.com>
 */
class HomeController extends Controller
{
	public function __construct($app, $request)
	{
		parent::__construct($app, $request);
	}

	public function index()
	{
		$this->app->render('home.twig', array());
	}
}

?>
