<?php

require_once '../controller/controller.php';
require_once '../models/hours.php';

/**
 * Description of hours
 *
 * @author Jesús Flores <jesusfloressanjose@gmail.com>
 */
class RportController extends Controller
{

	public function __construct($app, $request)
	{
		parent::__construct($app, $request);
	}

	public function index()
	{
		$getText = $this->getText();
		$viewData = array(
			'text' => $getText
		);
		$this->app->render($this->controller . '/' . $this->method . '.twig', $viewData);
	}

	public function create()
	{
		$getText = $this->getText();
		if ($this->assertUserIsLogged() == false)
		{
			$this->app->redirect('/user/login');
		}
		else
		{
			$hourModel = new HoursModel();
			$hours = $hourModel->returnHours();
			$viewData = array(
				'text' => $getText,
				'hours' => $hours
			);
			$this->app->render($this->controller . '/' . $this->method . '.twig', $viewData);
		}
	}

}

?>
