<?php

/**
 * Description of controller
 *
 * @author Jesús Flores <jesusfloressanjose@gmail.com>
 */

include_once '../class/util.php';

class Controller
{

	var $app;
	var $request;
	var $controller;
	var $method;

	var $view;
	var $viewData; // array with template vars

	public function __construct($app, $request)
	{
		$this->app = $app;
		$this->request = $request;
	}

	public function callMethod($method, $args = array())
	{
		$result = null;
		if (method_exists($this, $method))
		{
			$result = call_user_func_array(array($this, $method), $args);
		}
		else
		{
			throw new Exception(sprintf('The required method "%s" does not exist for %s', $method, get_class($this)));
		}
		return $result;
	}

	protected function getText()
	{
		$getText = yaml_parse_file('../texts/en.yml');
		return $getText;
	}

	public function getViewData()
	{
		$getText = $this->getText();
		$viewData = array(
			'text' => $getText
		);
		return $viewData;
	}

	public function initViewData()
	{
		$getText = $this->getText();
		$viewData = array(
			'text' => $getText
		);
		$this->viewData = $viewData;
		return true;
	}

}

?>
