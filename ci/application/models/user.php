<?php

class User extends CI_Model {





    function __construct() {       
        parent::__construct();
    }
    


    function is_user_avail() {
        $login_id = $this->input->post("username");
        $pwd = $this->input->post("password");
        $sql = "SELECT * FROM users WHERE  login_id = '".$login_id."' AND password = '".$pwd."'";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->row_array() ;  
        } else {
            return false;
        }
    }



    function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    function insert_entry()
    {
        $this->title   = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }

    

}

?>