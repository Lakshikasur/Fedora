<?php

class User_model extends CI_Model {

    var $table   = 'user';


    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }   


    function get_user_data($email, $pwd) {
        $this->db->where("EMAIL", $email );
        $this->db->where("PASSWORD", md5($pwd) );
        $query = $this->db->get($this->table);
        return $query->result();
    }


    function get_userdata_by_id($id) {
        $this->db->where("ID", $id );
        $query = $this->db->get($this->table);
        return $query->result();
    }


    function insert_new_user($udata) {
        
    }


}

?>