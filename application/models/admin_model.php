<?php

class Admin_model extends CI_Model {
	function __construct()
	{

	}

	public function verify_user($email,$password)
	{
		$q = $this
				->db
				->where('email_address', $email)
				->where('password',sha1($password))
				->limit(1)
				->get('users');

		if($q->num_rows > 0){
			// echo '<pre>';
			// print_r($q->row());
			// echo'</pre>';

			return $q->row();
		}
		return false;		
	}

	// public function get_users()
	// {
	// 	$q = $this->db->query("SELECT * FROM users");
	// 	if($q->num_rows() > 0){
	// 		foreach ($q->result() as $row) {
	// 			$data[] = $row;
	// 			# code...
	// 		}
	// 		return $data;
	// 	}
	// }

	function get_users(){
		$this->db->select('email_address');
		$q = $this->db->get('users');

		if($q->num_rows()>0)
			foreach ($q->result() as $row) {
				$data[] = $row;
				# code...
			}
			return $data;
	}

	function get_projects(){
		$this->db->select('project_name');
		$q = $this->db->get('projects');

		if($q->num_rows()>0)
			foreach ($q->result() as $row) {
				$data[] = $row;
				# code...
			}
			return $data;
	}

	// public function verify_user($email,$password)
	// {
	// 	$q = $this
	// 			->db
	// 			->where('email_address', $email)
	// 			->where('password',sha1($password))
	// 			->limit(1)
	// 			->get('users');

	// 	if($q->num_rows > 0){
	// 		// echo '<pre>';
	// 		// print_r($q->row());
	// 		// echo'</pre>';

	// 		return $q->row();
	// 	}
	// 	return false;		
	// }
	


	// public function id_for_username($username){

	// 	// $this->db->select('id');

	// 	// $q = $this
	// 	// 	->db
	// 	// 	->where('email_address', $username)				
	// 	// 	->limit(1)
	// 	// 	->get('users');


	// 	return -1;

	// }


	public function create_user($first_name,$last_name,$email,$password,$created_by_email,$admin)
	{

		$q = $this
			->db
			->where('email_address', $created_by_email)				
			->limit(1)
			->get('users');

		

		$created_by_id = $q->row(0)->id;
		
		// $created_by = id_for_username($username);		

		$data = array(
			'first_name' => $first_name,
			'last_name' => $last_name,
			'email_address' => $email,
			'password' => sha1($password),
			'created_by' => $created_by_id,
			'admin' => $admin
		);
		// print_r($data);

		$this->db->insert('users', $data);


	}

	public function create_project($bbi_project_id,$project_name)
	{

		// $q = $this
		// 	->db
		// 	->where('email_address', $created_by_email)				
		// 	->limit(1)
		// 	->get('users');

		

		// $created_by_id = $q->row(0)->id;
		
		// $created_by = id_for_username($username);		

		// $data = array(
		// 	'first_name' => $first_name,
		// 	'last_name' => $last_name,
		// 	'email_address' => $email,
		// 	'password' => sha1($password),
		// 	'created_by' => $created_by_id,
		// 	'admin' => $admin
		// );

		$data = array(
			'bbi_project_id' => $bbi_project_id,
			'project_name' => $project_name,			
		);
		// print_r($data);

		$this->db->insert('projects', $data);


	}


}