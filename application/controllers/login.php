<?php

class Login extends CI_Controller {
	
	function index()
	{
		$data['main_content'] = 'login_form';
		$email_address = $this->session->userdata('email_address');
		//echo "email" . $email_address;
		if(isset($email_address) && $email_address !='')
		{

			redirect('project');
			// echo "got inside";
		}
		$this->load->model('users_model');
		$data['is_admin'] = $this->users_model->is_admin($email_address);
		$this->load->view('includes/template', $data);		
	}
	
	function validate_credentials()
	{		
		$this->load->model('users_model');
		$query = $this->users_model->validate();
		
		if($query) // if the user's credentials validated...
		{
			$data = array(
				'email_address' => $this->input->post('email_address'),
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('project');
		}
		else // incorrect username or password
		{
			$this->index();
		}
	}	
	
	function signup()
	{
		$data['main_content'] = 'signup_form';
		$this->load->view('includes/template', $data);
	}
	
	function create()
	{
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('signup_form');
		}
		
		else
		{			
			$this->load->model('membership_model');
			
			if($query = $this->membership_model->create_member())
			{
				$data['main_content'] = 'signup_successful';
				$this->load->view('includes/template', $data);
			}
			else
			{
				$this->load->view('signup_form');			
			}
		}
		
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}


}