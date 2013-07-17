<?php

class Site extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}

	function index()
	{
		$email_address = $this->session->userdata('email_address');
		$this->load->model('users_model');
		$this->load->model('project_model');
		$data['userrow'] = $this->users_model->get_users();
		$data['projectrow'] = $this->project_model->get_projects();
		$data['is_admin'] = $this->users_model->is_admin($email_address);
		// $data['current_user'] = $_SESSION['email_address'];
		$data['current_user'] = $email_address;

		$data['userProjectRow'] = $this->project_model->get_user_projects($email_address);
		$data['main_content'] = 'logged_in_area';
		$this->load->view('includes/template', $data);


		// $this->load->view('logged_in_area');
	}

	function another_page() // just for sample
	{
		echo 'good. you\'re logged in.';
	}
	
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo 'You don\'t have permission to access this page. <a href="../ciLogin/login">Login</a>';	
			die();		
			//$this->load->view('login_form');
		}		
	}	

}
