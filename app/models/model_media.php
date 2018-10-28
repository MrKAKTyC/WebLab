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
		$sql = "SELECT * FROM media";
		$result = array();
		$res = $this->base->make_request($sql);
		// while($row = mysqli_fetch_assoc($res)) {
		// 	$result[] = $row;
		// }
		return $res;
		// return $result;
	}
}

?>