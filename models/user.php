
<?php

class UserModel
{

	var $connection = null;
	var $db = null;
	var $tUsers = null; //table hours; collection

	public function __construct()
	{
		if ($this->_connect())
		{
			$this->_selectDatabase();
			if ($this->tUsers == null)
			{
				$this->tUsers = $this->db->users;
			}
		}
		else
		{
			echo 'chungo';
		}
	}

	protected function _connect()
	{
		$this->connection = new MongoClient();
		return true;
	}

	protected function _selectDatabase()
	{
		$this->db = $this->connection->users;
	}

	public function assertUserExists($userName)
	{
		$result = false;
		$filter = array(
			'user' => $userName
		);
		$cursor = $this->tUsers->find($filter);
		foreach ($cursor as $user)
		{
			if($user['user'] == $userName)
			{
				$result = true;
			}
			break;
		}
		return $result;
	}

	public function assertEmailExists($userEmail)
	{
		$result = false;
		$filter = array(
			'email' => $userEmail
		);
		$cursor = $this->tUsers->find($filter);
		foreach ($cursor as $user)
		{
			if($user['email'] == $userEmail)
			{
				$result = true;
			}
			break;
		}
		return $result;
	}

	public function writeUser()
	{
		// add a record
		//$document = array("user" => "jflores", "password" => "test");
		//$this->tUsers->insert($document);
	}

}

?>
