<?php
class Controller_profile extends Controller
{

	function __construct()
	{
		$this->model = new Model_profile();
		$this->view = new View();
	}
	
	function action_index()
	{
		if(isset($_SESSION['login'])){
			$data = $this->model->get_user_data($_SESSION['login']);		
			$this->view->generate('profile_view.php', 'template_view.php', $data);
		}
	}

	function action_show($user)
	{
		$data = $this->model->get_user_data($user);		
		$this->view->generate('profile_view.php', 'template_view.php', $data);
	}

	public function action_update_data()
	{
		$data = $this->model->update_data($_POST['name'], $_POST['sname'], $_POST['role'], $_POST['login']);
		
	}
	public function action_update_pass()
	{
		$this->model->update_pass($_POST['old_psw'], $_POST['new_psw'],  $_POST['u_name']);
	}
	public function action_update_foto()
	{
		$this->model->update_foto($_POST['u_name'], $_POST['old_photo'], $_POST['new_photo']);	
	}


}
?>