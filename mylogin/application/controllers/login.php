<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		Parent::__construct();
			$this->load->helper(array('form','url','html'));
			$this->load->library('form_validation', "files");
			$this->load->model("user_model");		
	}
	
	
	public function index() {
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules("password", "Password", "trim|required|xss_clean");

		if( $this->form_validation->run() == FALSE ) {
			$this->load->view('login_view');
		} else {
			$isuserAvail = $this->user_model->get_user($email, $password);

			if( count($isuserAvail) > 0 ) {
				$sess_data = array('login' => TRUE, 'uname' => $isuserAvail[0]->fname, 'lname' => $isuserAvail[0]->lname,  'uid' => $isuserAvail[0]->id);
				$this->session->set_userdata($sess_data);
				redirect("login/welcome");
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid Login</div>');
				redirect('login/index');
			}
		}		
	}



	public function welcome() {
		$udata = $this->user_model->get_user_by_id( $this->session->userdata('uid') );
		
		$userData = array();
		$userData["user_name"] = $udata[0]->fname." ".$udata[0]->lname;
		$userData["email"] = $udata[0]->email;
		
		$this->load->view('profile_view', $userData);
	}


	public function logout() {
		//$data = array('login' => '', 'uname' => '', 'uid' => '');
        //$this->session->unset_userdata($data);
        $this->session->sess_destroy();
		redirect('login/index');
	}


	public function signup() {
		// set form validation rules
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]|md5');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
		
		if( $this->form_validation->run() == FALSE ) {
			$this->load->view("signup_view");
		} else {
			$insertDataArr = array();
			$insertDataArr["fname"]    = $this->input->post("fname");
			$insertDataArr["lname"]    = $this->input->post("lname");
			$insertDataArr["email"]    = $this->input->post("email");
			$insertDataArr["password"] = $this->input->post("password");

			if( $this->user_model->insert_user_data($insertDataArr) ) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please login to access your Profile!</div>');
				redirect('login/index');
			} else {
				$this->session->set_flashdata('msg','<div class="alert alert-error text-center">You are Successfully Registered! Please login to access your Profile!</div>');
				redirect('login/signin');
			}
		}		
	}


	public function emailcheck() {
		$email 		 = $this->input->post("email");
		$check_email = $this->user_model->check_email($email);

		if($check_email) {
			$data = array();
			$data["id"]    = $check_email[0]->id;
			$data["fname"] = $check_email[0]->fname;
			$data["email"] = $check_email[0]->email;	

			header('Content-Type: application/x-json; charset=utf-8');
			echo json_encode($data);
		}
	}

	 public function do_upload() { 
         $config['upload_path']   = './uploads/'; 
         $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
         $config['max_size']      = 100; 
         $config['max_width']     = 1024; 
         $config['max_height']    = 768;  
         $this->load->library('upload', $config);

         if ( ! $this->upload->do_upload('userfile')) { 	
            $error = array('error' => $this->upload->display_errors()); 
            $this->load->view('profile_view', $error); 
         }			
         else { 
        	print_r($this->upload->data());
               //exit;
            $data = array('upload_data' => $this->upload->data()); 
            $this->load->view('upload_success', $data); 
         } 
      } 

}
