<?php

require_once '../controller/controller.php';
require_once '../models/user.php';

/**
 * Description of user
 *
 * @author Jesús Flores <jesusfloressanjose@gmail.com>
 */
class UserController extends Controller
{

	public function __construct($app, $request)
	{
		parent::__construct($app, $request);
	}

	/**
	 *  This method logs the user and creates the view
	 */
	public function login()
	{
		$userLogin = $this->request->params('user');
		$passwordLogin = $this->request->params('password');
		if ($userLogin != null && $passwordLogin != null)
		{
			$this->validateSecurity();
			// attempt login
			echo 'logging in...';
		}
		else
		{
			$getText = $this->getText();
			$viewData = array(
				'text' => $getText
			);
			$this->app->render($this->controller . '/' . $this->method . '.twig', $viewData);
		}
	}

	public function create()
	{
		$secureFormToken = $this->getSecurity();
		$viewData = $this->getViewData();
		$viewData['secureFormToken'] = $secureFormToken;
		$this->app->render($this->controller . '/' . $this->method . '.twig', $viewData);
	}

	public function assertUserExists()
	{
		$userModel = new UserModel();
		$resultQuery = $userModel->assertUserExists('jflores');
		$response = array(
			'userExists' => $resultQuery);
		echo json_encode($response);
	}

	public function writeUser()
	{
		if ($this->validateSecurity() && $this->validateWriteUser())
		{
			$userData = $this->getUserDataFromRequest();
			// we have to send an email validation token
			$this->assertUserExists($this->request->params('user'));
			$userModel = new UserModel();
			$resultQuery = $userModel->writeUser();
			$response = array(
				'result' => $resultQuery);
			echo json_encode($response);
		}
	}

	public function validateWriteUser()
	{
		$result = false;
		$user = trim($this->request->params('user'));
		$password1 = $this->request->params('password1');
		$password2 = $this->request->params('password2');
		if ($password1 == $password2)
		{
			$result = true;
		}
		if ($user != '' && $result != false)
		{
			$userModel = new UserModel();
			$result & $userModel->assertUserExists($user);
		}
		$response = array(
			'result' => $result);
		echo json_encode($response);
	}

	public function getUserDataFromRequest()
	{
		$requireMailValidation = true;
		if ($requireMailValidation)
		{
			$mailToken = md5(SECURITY . trim($this->request->params('email')));
		}
		$userData = [
			'user' => trim($this->request->params('user')),
			'password' => $this->request->params('password'),
			'email' => trim($this->request->params('user')),
		];
	}

}

?>
