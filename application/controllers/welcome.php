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
		$this->load->model('admin_model');

		$data['userrow'] = $this->admin_model->get_users();
		$data['projectrow'] = $this->admin_model->get_projects();
		$data['admin'] = true;
		$this->load->view('welcome_message', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */