
<?php

class Hours
{
	var $connection = null;
	var $db = null;
	var $tHours = null; //table hours

	public function __construct()
	{
		$this->_connect();
		$this->_selectDatabase();
		if ($this->tHours == null)
		{
			$this->tHours = $this->db->hours;
		}
	}

	protected function _connect()
	{
		$this->connection = new MongoClient();
		return true;
	}

	protected function _selectDatabase()
	{
		$this->db = $this->connection->timeReport;
	}

	public function writeHours()
	{
		// add a record
		$document = array("title" => "Calvin and Hobbes", "author" => "Bill Watterson");
		$this->tHours->insert($document);
	}

	public function returnHours()
	{
		$cursor = $this->tHours->find();
		$result = array();
		// iterate through the results
		foreach ($cursor as $document)
		{
			array_push($result, $document);
		}
		return $result;
	}

}

?>
