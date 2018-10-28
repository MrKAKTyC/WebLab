<?php

class Controller_animation extends Controller
{
	
	function action_index()
	{
		$this->view->generate('animation_view.php', 'template_view.php');
	}

}
?>