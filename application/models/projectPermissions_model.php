<?php

class ProjectPermissions_model extends CI_Model {
	function __construct()
	{

	}

	function add_project_user($project_id,$user_id,$user_security_level){

		$data = array(
			'project_id' => $project_id,
			'user_id' => $user_id		,
			'user_security_level' => $user_security_level	
		);
		// print_r($data);

		$this->db->insert('projectPermissions', $data);
	}
}