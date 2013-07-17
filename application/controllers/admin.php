<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		session_start();
	}

	public function index()
	{
		if(isset($_SESSION['username']))//if logged already go directy to welcome page
		{
			redirect('welcome');
		}
		
		$data['main_content'] = 'login_view';
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');

		if($this->form_validation->run() !== false){
			//then form validation passed. get from db.

			$this->load->model('users_model');

			$res = $this->users_model->verify_user(
				$this->input->post('email_address'), 
				$this->input->post('password')
			);
			
			if($res!==false){
				//person has an account

				$_SESSION['username'] = $this->input->post('email_address');
				redirect('welcome');
			}
		}
	
		$this->load->view('includes/template', $data);
	}

	public function logout()
	{
		session_unset();
		$data['main_content'] = 'login_view';

		$this->load->view('includes/template', $data);
	}


}
