<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of util
 *
 * @author Jesús Flores <jesusfloressanjose@gmail.com>
 */
class Util
{

	static public function checkEmails($emails)
	{
		require_once ("../lib/validate_mail.php");
		require_once ("../models/user.php");

		if (!is_array($emails))
		{
			$emails = (array) $emails;
		}

		$result = array();
		$allValid = true;

		$validateMail = new ValidateMail();

		$userModel = new UserModel();
		foreach ($emails as $email)
		{
			$result[$email] = true;
			$userExists = $userModel->assertEmailExists($email);
			if (!$userExists)
			{
				$_result = $validateMail->checkEmails($emails);
				if ($_result !== true)
				{
					$allValid = false;
					$result[$email] = array_pop($_result);
				}
			}
		}

		if ($allValid)
		{
			$result = true;
		}

		return $result;
	}

}

?>
