<?php
class Controller_Main extends Controller
{
	public function __construct()
	{
		$this->model = new Model_main();
		$this->view = new View();
	}
	public function action_index()
	{	
		$data = $this->model->get_data();
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}
	public function action_login()
	{
		$data = $this->model->log_in($_POST['login'], $_POST['password']);
		echo json_encode($data);
	}
	public function action_logoff()
	{
		unset($_SESSION['role']);
		unset($_SESSION['login']);
	}
	public function action_delet()
	{
		$this->model->delete($_POST['id']);
	}
	public function action_register()
	{
		$data = $this->model->add($_POST['login'], $_POST['psw'], $_POST['role'], $_POST['name'], $_POST['surname']);
		return $data;
	}
	public function action_sort()
	{
		$data = $this->model->get_sorted_data($_POST['col'], $_POST['dir']);
		echo json_encode($data);
	}
}
?>