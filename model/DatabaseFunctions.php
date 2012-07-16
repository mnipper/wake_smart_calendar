<?php
include 'Database.php';
class DatabaseFunctions
{
	// The Database object on which to perform the functions.
	protected $database;

	// Set a trace to spot query issues.
	protected $trace = false;

	/*
	 * Creates a Database object upon construction.
	*/
	public function __construct()
	{
		$this->database = new Database();
		
		if ($this->trace)
			$this->database->activateTrace();
	}


	/*
	 * Get an array of results from a query.
	*/
	public function getResultArray($query)
	{
		
		if (!$this->database->execQuery($query))
			if ($this->trace)
				echo '<br /><br /><font color="red"><b>Unable to complete query: ' . $query . "</b></font>";
		
		return $this->database->getResult();
	}


	/*
	 * Execute a query; such as an update, delete or insert.
	*/
	public function sendQuery($query)
	{
		$this->database->execQuery($query, false);
	}


	/*
	 * Get the number of results for a given query.
	*/
	public function getResultCount($query)
	{
		
		$this->database->execQuery($query);

		return $this->database->getNumResults();
	}
	
	/*
	 * Activate the trace functionality to trace SQL queries.
	 */
	public function activateTrace()
	{
		$this->database->activateTrace();
	}
	
	/*
	* Activate the trace functionality to trace SQL queries.
	*/
	public function deactivateTrace()
	{
		$this->database->deactivateTrace();
	}
}
$db = new DatabaseFunctions();
print_r($db->getResultArray("SELECT * FROM comments"));
?>
