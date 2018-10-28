<?php 
/**
* Class for working with db server
*/
class SQLBase
{	
		private $dbhost = "localhost";
		private $dbuser = "root"; 
		private $dbpass = "";
		private $connect;

	function __construct($host, $user, $password)
	{
		$this->dbhost = $host;
		$this->dbuser = $user;
		$this->dbpass = $password;
	}

	public function connect(){
		$this->connect = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass);
	}
	public function select_base($db_name)
	{
		return mysqli_select_db($this->connect, $db_name);
	}
	public function make_request($request)
	{
		return mysqli_query($this->connect, $request);	
	}
}
?>