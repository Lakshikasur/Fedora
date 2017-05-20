<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class user_model extends CI_Model {

	function __construct()  {
        parent::__construct();
    }

	
	function get_user($email, $pwd) {
		$this->db->where("EMAIL", $email);
		$this->db->where("PASSWORD", md5($pwd));
		$query = $this->db->get("user");

		return $query->result();
	}

	
	// get user
	function get_user_by_id($id)  {
		$this->db->where('id', $id );
		$query= $this->db->get("user");
		
		return $query->result();
	}

	
	// insert
	function insert_user_data($data) {

		//print_r($data);
		return $this->db->insert('user', $data);
	}


	public function check_email($email){
		$this->db->where("email", $email );
		$query = $this->db->get("user");

		return $query->result();
	}

}



?>