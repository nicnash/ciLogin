<?php

class Project_model extends CI_Model {
	function __construct()
	{

	}
	
	function get_project($project_id){
			$q = $this
			->db
			->where('id', $project_id)				
			->limit(1)
			->get('projects');

		return  $q->row(0);
	}

	function get_projects(){
		$this->db->select('project_name,id');
		$q = $this->db->get('projects');
		
		if($q->num_rows()>0)
			foreach ($q->result() as $row) {
				$data[] = $row;
				# code...
			}
			return $data;
	}
	
	public function create_project($bbi_project_id,$project_name)
	{

		$data = array(
			'bbi_project_id' => $bbi_project_id,
			'project_name' => $project_name,			
		);
		// print_r($data);

		$this->db->insert('projects', $data);

	}
	function get_user_projects($user_email){

		$q = $this
			->db
			->where('email_address', $user_email)				
			->limit(1)
			->get('users');

		$created_by_id = $q->row(0)->id;

		$q = $this->db->query("
			SELECT project_id,project_name
			FROM projectPermissions
			INNER JOIN projects
			ON projectPermissions.project_id=projects.id
			WHERE projectPermissions.user_id = " . $created_by_id);

		if($q->num_rows()>0)
			foreach ($q->result() as $row) {
				$data[] = $row;
				# code...
			}
			else
				return null;
			return $data;


	}
}