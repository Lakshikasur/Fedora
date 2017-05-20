<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model {
	
	var $entity_tbl = "user";


	function __construct() {
		parent::__construct();
	}


	public function get_user( $email, $pwd ) {
		$this->db->where("EMAIL", $email );
		$this->db->where("PASSWORD", md5($pwd));
		$qry = $this->db->get($this->entity_tbl);

		return $qry->result();
	}


	public function insert_user($udata) {
		return $this->db->insert( $this->entity_tbl, $udata );
	}


	public function get_user_data($id) {
		$this->db->where('ID', $id);
        $query = $this->db->get($this->entity_tbl);

        return $query->result();
	}

}

?>

