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
		
		$this->load->model('project_model');

		$data = $this->project_model->get_project($project_id);

		$this->load->view('project_view',$data);

	}
	public function id($project_id)
	{		
		$this->load->model('users_model');
		$this->load->model('project_model');
		$data['userProjectRow'] = $this->project_model->get_user_projects($_SESSION['username']);
		$data['is_admin'] = $this->users_model->is_admin($_SESSION['username']);


// print_r($data['userProjectRow']);
		$access=false;
		foreach ($data['userProjectRow'] as $r) {
			if($r->project_id == $project_id)
			{
				$access=true;
				break;
			}


		}
// echo "access= " . $access;
		if($access == true || $data['is_admin'] == 1){
			$data['project_info'] = $this->project_model->get_project($project_id);
			$data['userrow'] = $this->users_model->get_users();
			$data['projectrow'] = $this->project_model->get_projects();
			$data['current_user'] = $_SESSION['username'];

				

			$this->load->view('project_view',$data);
		}else{
			redirect('admin');
		}

// 		$this->load->library('ftp');

// 		$config['hostname'] = '205.178.145.65';
// 		$config['username'] = 'ftp1956912';
// 		$config['password'] = 'Bbi200022~';
// 		$config['debug']    = TRUE;

// 		$this->ftp->connect($config);

// 		// $this->ftp->mirror('/path/to/myfolder/', '/public_html/myfolder/');
// 		$list = $this->ftp->list_files('/htdocs/projects/portaltest/');
// 				 print_r($list);

// 		foreach ($list as $row) {
// 			# code...
// 			$list2 = $this->ftp->list_files($row);
// 			print_r($list2);
// 		}
// 		// $list = $this->ftp->directory_map('/htdocs/');


// 		// foreach ($list as $file) {
// 		// 	echo $file . "<br>";
// 		// }

// 		$this->ftp->close();
// die();
		

	}
}

/* End of file project.php */
/* Location: ./application/controllers/project.php */