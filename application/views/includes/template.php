<?php 

	$this->load->view('includes/header');

	if($main_content !='login_form')
		$this->load->view('includes/top_menu',$is_admin);

	$this->load->view($main_content); 
	$this->load->view('includes/footer'); 
?>