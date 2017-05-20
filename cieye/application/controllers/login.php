<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->helper(array("form", "html", "url"));
		$this->load->library("form_validation");
		$this->load->model("user_model");
	}	

	
	public function index() {
		$email    = $this->input->post("EMAIL");
		$password = $this->input->post("PASSWORD");

		$this->form_validation->set_rules("EMAIL", "Email", "trim|required|xss_clean");
		$this->form_validation->set_rules("PASSWORD", "Password", "trim|required|xss_clean");

		if( $this->form_validation->run() == FALSE ) {
			$this->load->view('login_view');
		} else {
			$email    = $this->input->post("EMAIL");
			$urec = $this->user_model->get_user( $email, $password );

			if( count($urec) > 0 ) {
				$user_data = array(
								"login" 		=> TRUE,
								"first_name" 	=> $urec[0]->FIRST_NAME,
								"last_name" 	=> $urec[0]->LAST_NAME,
								"id"			=> $urec[0]->ID,
							);
				$this->session->set_userdata($user_data);
				redirect("login/profile");
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Wrong Email or Password!</div>');
				redirect('login/index');
			}
		}
	} //endpublic function index() {



	public function signup() {
		$this->form_validation->set_rules("FIRST_NAME", "First Name", "trim|required|alpha|min_lenth[3]|max_lenth[100]|xss_clean");
		$this->form_validation->set_rules("LAST_NAME", "Last Name", "trim|required|alpha|min_lenth[3]|max_lenth[100]|xss_clean");
		$this->form_validation->set_rules("EMAIL", "Email", "trim|required|valid_email|is_unique[user.EMAIL]");
		$this->form_validation->set_rules("CPASSWORD", "Confirm Password", "trim|required");
		$this->form_validation->set_rules("PASSWORD", "Password", "trim|required|matches[CPASSWORD]|md5");

		if( $this->form_validation->run() == FALSE ) {
			$this->load->view('signup_view');
		} else {
			$ndata =array();
			$ndata["FIRST_NAME"] 	= $this->input->post("FIRST_NAME");
			$ndata["LAST_NAME"] 	= $this->input->post("LAST_NAME");
			$ndata["EMAIL"] 		= $this->input->post("EMAIL");
			$ndata["PASSWORD"] 		= $this->input->post("PASSWORD");

			if( $this->user_model->insert_user($ndata)) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please login to access your Profile!</div>');
				redirect('login/index');
			} else {
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Error when insert data!</div>');
				redirect('login/signup');
			}
		}		
    }


    public function profile() { 	
    	$udata 				= $this->user_model->get_user_data($this->session->userdata("id"));
    	$data["full_name"]  = $udata[0]->FIRST_NAME." ".$udata[0]->LAST_NAME;
    	$data["email"]      = $udata[0]->EMAIL;
    	$data["id"]         = $udata[0]->ID;

    	$this->load->view("profile_view", $data);
    }


    public function edit_user($id) {
    	$udata 		= $this->user_model->get_user_data($id);
    	$userData["FIRST_NAME"]   = "222";
    	print_r($this->input->post("FIRST_NAME") );
    	$userData["FIRST_NAME"]   = ($this->input->post("FIRST_NAME"))?$this->input->post("FIRST_NAME"):$udata[0]->FIRST_NAME;
    	$this->session->set_flashdata('user_data', $userData);

    	$this->load->view("edit_view");
    	
    }



}
