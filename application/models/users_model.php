<?php

class users_model extends CI_Model {
	function __construct()
	{

	}

	// public function verify_user($email,$password){
	// 	$q = $this
	// 			->db
	// 			->where('email_address', $email)
	// 			->where('password',sha1($password))
	// 			->limit(1)
	// 			->get('users');

	// 	if($q->num_rows == 1){
	// 		// echo '<pre>';
	// 		// print_r($q->row());
	// 		// echo'</pre>';

	// 		return $q->row();
	// 	}
	// 	return false;		
	// }

	function validate()
	{
		$this->db->where('email_address', $this->input->post('email_address'));
		$this->db->where('password', sha1($this->input->post('password')));
		$query = $this->db->get('users');
		
		if($query->num_rows == 1)
		{
			return true;
		}
		
	}


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
	

	function is_admin($email){
		$q = $this
			->db
			->where('email_address', $email)				
			->limit(1)
			->get('users');

		return $q->row(0)->admin;
	}

	
	public function create_user($first_name,$last_name,$email,$password,$created_by_email,$admin){

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

}