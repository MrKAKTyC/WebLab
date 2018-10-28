<?php
class Model_main extends Model
{
	private $base;

	public function __construct()
	{
		$db = new SQLBase("localhost", "root", "");
		$connect = $db->connect();
		$db->select_base("Base");
		$this->base = $db;
	}
	public function get_data()
	{
		$result = $this->base->make_request("SELECT * FROM users");
		return $result;
	}
	public function get_sorted_data($column, $direction)
	{
		$result = $this->base->make_request("SELECT * FROM users ORDER BY ".$column." ".$direction);
		$answer = array();
		while($resul = mysqli_fetch_assoc($result)) {
			$answer[] = $resul;
		}
		return $answer;
	}
	public function delete($user_id)
	{
		$sql = "DELETE FROM `users` WHERE id=".$user_id;
		$res = $this->base->make_request($sql);
	}
	public function add($login, $psw, $role, $name, $surname)
	{
		$return = array();
		$sql = "INSERT INTO `users`(`Login`, `Password`, `role`, `Name`,`Surname`, `Photo`) VALUES ('".$login."','".$psw."','".$role."','".$name."','".$surname."','/assets/img/def.png')";
		$this->base->make_request($sql);

		$sql = "SELECT id FROM users WHERE Login = '".$login."'";
		// echo $sql;
		$res = $this->base->make_request($sql);
		while($result = mysqli_fetch_assoc($res)){
			echo $result['id'];
		}
	}
	public function log_in($login, $psw)
	{
		header('Content-type: application/json');
		// $answer = array();
		$result = $this->base->make_request("SELECT role, Login FROM users WHERE login='".$login."' AND password='".$psw."'");
		while($res = mysqli_fetch_assoc($result)) {
		  	$_SESSION['role'] = $res['role'];
		  	$_SESSION['login'] = $res['Login'];
			return $res;
		  	// $answer=$res;
		}
		// return $answer;
	}
}?>
