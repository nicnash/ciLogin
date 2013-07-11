<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {

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

	public function index($project_id)
	{
		
		$this->load->model('admin_model');

		$data = $this->admin_model->get_project($project_id);

			

		$this->load->view('project_view',$data);



		

	}
	public function id($project_id)
	{
		
		$this->load->model('admin_model');

		$data['project_info'] = $this->admin_model->get_project($project_id);

		$data['userrow'] = $this->admin_model->get_users();
		$data['projectrow'] = $this->admin_model->get_projects();
		$data['is_admin'] = $this->admin_model->is_admin($_SESSION['username']);
		$data['current_user'] = $_SESSION['username'];

		$data['userProjectRow'] = $this->admin_model->get_user_projects($_SESSION['username']);
			

		$this->load->view('project_view',$data);



		

	}
}

/* End of file project.php */
/* Location: ./application/controllers/project.php */