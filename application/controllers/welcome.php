<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
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
		$data['main_content'] = 'welcome_message';
		$this->load->model('users_model');
		$this->load->model('project_model');
		$data['userrow'] = $this->users_model->get_users();
		$data['projectrow'] = $this->project_model->get_projects();
		$data['is_admin'] = $this->users_model->is_admin($_SESSION['username']);
		$data['current_user'] = $_SESSION['username'];

		$data['userProjectRow'] = $this->project_model->get_user_projects($_SESSION['username']);

		$this->load->view('includes/template', $data);
	}
	public function user($param1)
	{
		echo "asfe2" . $param1;
		die();
	}

	// public function index($param1)
	// {
	// 	echo($user_id);
	// 	die();
	// }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */