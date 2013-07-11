<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create_project extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/register
	 *	- or -  
	 * 		http://example.com/index.php/register/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		session_start();
		parent::__construct();


		//if not logged in, deny access (reroute )
		if(!isset($_SESSION['username']))
		{
			redirect('admin');
		}
	}

	public function index()
	{


		$this->load->library('form_validation');
		$this->form_validation->set_rules('bbi_project_id','bbi_project_id','required|integer');
		$this->form_validation->set_rules('project_name','Project Name','required');

		if($this->form_validation->run() !== false){
			//then form validation passed. get from db.

			$this->load->model('admin_model');

			$this->admin_model->create_project(
				$this->input->post('bbi_project_id'), 
				$this->input->post('project_name')
			);

			$this->load->view('project_create_success_view');


			// if($res!==false){
			// 	//person has an account
			// 	// echo "PASSED!";

			// 	$_SESSION['username'] = $this->input->post('email_address');
			// 	redirect('welcome');
			// }
		}

		$this->load->view('create_project_view');







		// $this->load->model('admin_model');
		// $data['row'] = $this->admin_model->get_users();

		// $this->load->view('register_view', $data);
		

	}
}

/* End of file create_project.php */
/* Location: ./application/controllers/create_project.php */