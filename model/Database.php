<?php
class Database
{
	// Database access variables.
	private $db_host = '0.0.0.0';
	private $db_user = 'user';
	private $db_pass = 'pw';
	private $db_name = 'wake_smart_calendar';

	// Connection variables.
	private $con = false;
	private $myconn;

	// Result array.
	private $result = array();
	private $numResults;

	// Trace boolean.  Set this to true to see a trace of all executed SQL statements.
	private $trace = false;


	/*
	 * Constructor that sets and connects the database.
	 */
	public function __construct()
	{
		if (!$this->connect())
			echo 'Unable to connect to database.';
		$this->setDatabase($this->db_name);
		$this->numResults = 0;
	}
	
	/*
	 * Connects to the database, only one connection
	* allowed
	*/
	public function connect()
	{
		if(!$this->con)
		{
			$myconn = @mysql_connect($this->db_host,$this->db_user,$this->db_pass);
			$this->myconn = $myconn;
			if($myconn)
			{
				$seldb = @mysql_select_db($this->db_name,$myconn);
				if($seldb)
				{
					$this->con = true;
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
		else
		{
			return true;
		}
	}


	/*
	 * Changes the new database, sets all current results
	* to null
	*/
	public function setDatabase($name)
	{
		if($this->con)
		{
			if(@mysql_close())
			{
				$this->con = false;
				$this->results = null;
				$this->db_name = $name;
				$this->connect();
			}
		}

	}


	/*
	 * Executes a query on the database.
	*/
	public function execQuery($q, $count=true)
	{
		
		$this->result = array();
		$this->numResults = 0;
		
		if ($this->trace) {
			echo '<br />' . $q;
		}
		
		$query = @mysql_query($q);

		if($query)
		{
			if ($count == true)
				$this->numResults = mysql_num_rows($query);
			for($i = 0; $i < $this->numResults; $i++)
			{
				$r = mysql_fetch_array($query);
				$key = array_keys($r);
				for($x = 0; $x < count($key); $x++)
				{
					// Sanitizes keys so only alphavalues are allowed
					if(!is_int($key[$x]))
					{
						if(mysql_num_rows($query) > 1)
						$this->result[$i][$key[$x]] = $r[$key[$x]];
						else if(mysql_num_rows($query) < 1)
						$this->result = null;
						else
						$this->result[$key[$x]] = $r[$key[$x]];
					}
				}
			}
			return true;

		}
		else
		{
			return false;
		}
	}


	/*
	 * Gets the result as an array.
	*/
	public function getResult()
	{
		return $this->result;
	}


	/*
	 * Activates the trace feature.
	*/
	public function activateTrace()
	{
		$this->trace = true;
	}


	/*
	 * Deactivates the trace feature.
	*/
	public function deactivateTrace()
	{
		$this->trace = false;
	}
	
	public function getNumResults()
	{
		return $this->numResults;
	}

}
?>
