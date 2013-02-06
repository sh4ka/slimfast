<?php

/**
 * Description of controller
 *
 * @author Jesús Flores <jesusfloressanjose@gmail.com>
 */
class Controller
{
	var $app;
	var $controller;
	var $method;

	var $view;

	public function __construct($app)
	{
		$this->app = $app;
		return;
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
		$getText = yaml_parse_file('texts/es.yml');
		return $getText;
	}
}

?>
