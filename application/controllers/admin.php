<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		session_start();
	}

	public function index()
	{

		if($this->input->post('url') == 'login')//just came from clicking login submit button
		{


			if(isset($_SESSION['username']))
			{

				redirect('welcome');
			}
		
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');

			if($this->form_validation->run() !== false){
				//then form validation passed. get from db.

				$this->load->model('admin_model');

				$res = $this->admin_model->verify_user(
					$this->input->post('email_address'), 
					$this->input->post('password')
				);
				
				if($res!==false){
					//person has an account


					$_SESSION['username'] = $this->input->post('email_address');
					redirect('welcome');
				}
			}
		$this->load->view('login_view');

		}else if($this->input->post('url') == 'register'){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');

			if($this->form_validation->run() !== false){
				//then form validation passed. get from db.

				$this->load->model('admin_model');

				$this->admin_model->create_user(
					$this->input->post('email_address'), 
					$this->input->post('password')
				);
				
				redirect('register');
				// if($res!==false){
				// 	//person has an account
				// 	// echo "PASSED!";

				// 	$_SESSION['username'] = $this->input->post('email_address');
				// 	redirect('welcome');
				// }
			}

			$this->load->view('register_view');


		}else{
						$this->load->view('login_view');

		}

	}

	public function logout()
	{
		session_unset();
		$this->load->view('login_view');
	}

	function register(){
		$this->load->view('register_view');
	}

}
