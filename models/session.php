<?php

class Session
{
	public function __construct()
	{
		if (!headers_sent())
		{
			session_start();
		}
	}

	public function getId()
	{
		return session_id();
	}

	public function kill()
	{
		session_unset();
		session_destroy();
	}

	public function clean()
	{
		session_unset();
	}

	public function unsetVar($varName)
	{
		unset($_SESSION[$varName]);
	}

	public function setVar($varName, $value)
	{
		if (!empty($varName))
		{
			$_SESSION[$varName] = $value;
		}
	}

	public function getVar($varName)
	{
		if (!empty($_SESSION[$varName]))
		{
			return $_SESSION[$varName];
		}

		return false;
	}

	public function getAll(){
		return $_SESSION;
	}

	public function cleanVars()
	{
		if (!empty($_SESSION))
		{
			foreach($_SESSION as $key => $value)
			{
				unset($_SESSION[$key]);
			}
		}
	}

}
