<?php
class Controller_Media extends Controller
{

	public function __construct()
	{
		$this->model = new Model_main();
		$this->view = new View();
	}
	function action_index()
	{	
		$data = $this->model->get_data();
		$this->view->generate('media_view.php', 'template_view.php', $data);
	}
}
?>