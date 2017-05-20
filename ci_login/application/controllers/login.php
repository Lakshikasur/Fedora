<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library("form_validation");
		$this->load->model("user_model");
	}
	


	public function index() {
		$email = $this->input->post("EMAIL");
		$pwd = $this->input->post("PASSWORD");

		$this->form_validation->set_rules("EMAIL", "Email", "required|xss_clean|trim|valid_email");
		$this->form_validation->set_rules("PASSWORD", "Password", "required|xss_clean|trim");

		if( $this->form_validation->run() == FALSE ) {
			$this->load->view('login_view');
		} else {
			$urec = $this->user_model->get_user_data( $email, $pwd );
			if( count($urec) > 0) {
				$userData = array("login"=>TRUE, "FIRST_NAME" => $urec[0]->FIRST_NAME, "EMAIL" => $urec[0]->EMAIL, "ID" => $urec[0]->ID );
				$this->session->set_userdata($userData);
				redirect("login/profile");
			} else {
				$this->session->set_flashdata("msg", '<div class="alert alert-danger text-center">Wrong Email or Password!</div>');
				$this->load->view('login_view');
			}	
		}		
	}	


	public function profile() {
		$urec 			= $this->user_model->get_userdata_by_id($this->session->userdata("ID"));
		$udata          = array();
		$udata["name"]  =  $urec[0]->FIRST_NAME." ".$urec[0]->LAST_NAME;
		$udata["email"] =  $urec[0]->EMAIL;

		$this->load->view("profile_view", $udata );
	}


	public function logout() {
		$this->session->sess_destroy();
		redirect("login/index");
	}


	public function signup() {
		$this->form_validation->set_rules("FIRST_NAME", "First Name", "trim|alpha|required|min_lengh[3]|max_lenth[100]|xss_clean");
		$this->form_validation->set_rules("LAST_NAME", "Last Name", "trim|alpha|required|min_lengh[3]|max_lenth[100]|xss_clean");
		$this->form_validation->set_rules("EMAIL", "Email", "trim|required|valid_email|is_unique[user.EMAIL]");
		$this->form_validation->set_rules("PASSWORD", "Password", "required|matches[CPASSWORD]");

		if( $this->form_validation->run() == FALSE ) {
			$this->load->view("signup_view");
		} else {
			$newData = array();
			$newData["FIRST_NAME"] 	= $this->input->post("FIRST_NAME");
			$newData["LAST_NAME"] 	= $this->input->post("LAST_NAME");
			$newData["EMAIL"] 		= $this->input->post("EMAIL");
			$newData["PASSWORD"] 	= $this->input->post("PASSWORD");

			$this->user_model->insert_new_user($newData);
		}
		
	}

}

