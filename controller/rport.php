<?php
require_once 'controller/controller.php';
require_once 'models/hours.php';
/**
 * Description of hours
 *
 * @author Jesús Flores <jesusfloressanjose@gmail.com>
 */
class Rport extends Controller
{
	public function __construct($app)
	{
		$this->app = $app;
		return;
	}

	public function index()
	{
		$getText = $this->getText();
		$viewData = array(
			'text' => $getText
		);
		$this->app->render($this->controller.'/'.$this->method.'.twig', $viewData);
	}

	public function create()
	{
		$getText = $this->getText();
		$hourModel = new Hours();
		$hours = $hourModel->returnHours();
		$viewData = array(
			'text' => $getText,
			'hours' => $hours
		);
		$this->app->render($this->controller.'/'.$this->method.'.twig', $viewData);
	}
}

?>
