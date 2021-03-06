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
		parent::__construct();
		$this->is_logged_in();
	}
	// public function index()
	// {
	// 	$this->load->view('projects');
	// }

	public function index()
	{
		$this->load->model('project_model');
		$this->load->model('users_model');

		$email_address = $this->session->userdata('email_address');
		$data['is_admin'] = $this->users_model->is_admin($email_address);

		// if($project_id != ''){
			// $data = $this->project_model->get_project($project_id);

			// $data['main_content'] = 'project_view';
			// $this->load->view('includes/template', $data);

		// }else{
			$data['projects'] = $this->project_model->get_user_projects($email_address);

			$data['main_content'] = 'projects';
			$this->load->view('includes/template', $data);
		// }

	}

	public function id($project_id)
	{

// static $allFiles = array(); 
//     $contents = ftp_nlist($ftpConnection, $path); 

//     foreach($contents as $currentFile) { 
//         // assuming its a folder if there's no dot in the name 
//         if (strpos($currentFile, '.') === false) { 
//             ftpRecursiveFileListing($ftpConnection, $currentFile); 
//         } 
//         $allFiles[$path][] = substr($currentFile, strlen($path) + 1); 
//     } 
					// $ftp_server = '205.178.145.65';
					// $conn_id = ftp_connect($ftp_server);
					// $ftp_user_name = 'ftp1956912';
					// $ftp_user_pass='Bbi200022~';

					// // login with username and password
					// $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

					// // get contents of the current directory
					// $contents = ftp_nlist($conn_id, ".");

					// // output $contents
					// var_dump($contents);








		$this->load->model('project_model');
		$this->load->model('users_model');

		$email_address = $this->session->userdata('email_address');
		$data['is_admin'] = $this->users_model->is_admin($email_address);
		
		$data['project'] = $this->project_model->get_project($project_id);

			$data['main_content'] = 'project_view';
			$this->load->view('includes/template', $data);
		


	}

	public function create(){
		$this->load->model('users_model');

		$email_address = $this->session->userdata('email_address');
		$data['is_admin'] = $this->users_model->is_admin($email_address);

		$this->load->library('form_validation');
		$this->form_validation->set_rules('bbi_project_id','bbi_project_id','required|integer');
		$this->form_validation->set_rules('project_name','Project Name','required');

		if($this->form_validation->run() !== false){
			//then form validation passed. get from db.

			$this->load->model('project_model');

			$this->project_model->create_project(
				$this->input->post('bbi_project_id'), 
				$this->input->post('project_name')
			);

			$data['main_content'] = 'project_create_success';
			$this->load->view('includes/template', $data);


			// if($res!==false){
			// 	//person has an account
			// 	// echo "PASSED!";

			// 	$_SESSION['username'] = $this->input->post('email_address');
			// 	redirect('welcome');
			// }
		}
		
		$data['main_content'] = 'create_project_view';
		$this->load->view('includes/template', $data);



	}
// 	public function id($project_id)
// 	{
// echo "a2222sdf";
// die();
// 			$email_address = $this->session->userdata('email_address');;
// 		$this->load->model('users_model');
// 		$this->load->model('project_model');
// 		$data['userProjectRow'] = $this->project_model->get_user_projects($email_address);
// 		$data['is_admin'] = $this->users_model->is_admin($email_address);


// // print_r($data['userProjectRow']);
// 		$access=false;
// 		foreach ($data['userProjectRow'] as $r) {
// 			if($r->project_id == $project_id)
// 			{
// 				$access=true;
// 				break;
// 			}


// 		}
// // echo "access= " . $access;
// 		if($access == true || $data['is_admin'] == 1){
// 			$data['project_info'] = $this->project_model->get_project($project_id);
// 			$data['userrow'] = $this->users_model->get_users();
// 			$data['projectrow'] = $this->project_model->get_projects();
// 			$data['current_user'] = $email_address;

				

// 			$this->load->view('project_view',$data);
// 		}else{
// 			redirect('admin');
// 		}

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
		

	// }
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';	
			die();		
			//$this->load->view('login_form');
		}		
	}	
}

/* End of file project.php */
/* Location: ./application/controllers/project.php */