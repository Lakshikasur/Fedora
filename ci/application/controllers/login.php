<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model("user");
    }
	 

	



	public function index() {		
		$this->load->view('template/header');
		$this->load->view('login');
		$this->load->view('template/footer');
	}


	public function is_user_avail($str) {

		$userAvail = $this->user->is_user_avail();
		if( $userAvail ) {
			$session_data = Array(
								"user_id" => $userAvail["user_id"],
								"login_id" => $userAvail["login_id"],
								"first_name" => $userAvail["first_name"],
								"last_name" => $userAvail["last_name"],
								"email" => $userAvail["email"],
								 'logged_in' => TRUE
							);
			$this->session->set_userdata($session_data);

			return TRUE;
		} else {
			$this->form_validation->set_message('is_user_avail', 'User not avalible');
			return FALSE;
		}

	}





	public function login_process() {		
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('username', 'Username', 'callback_is_user_avail');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header');
			$this->load->view('login');
			$this->load->view('template/footer');
		} else 	{
			$this->load->view('template/header');
			$this->load->view('add_event');
			$this->load->view('template/footer');		
		}
	}

	public function is_valid_date($edate) {


		$this->form_validation->set_message('is_valid_date', 'User not avalible');
		return FALSE;
	}


	public function add_event() {
		$this->form_validation->set_rules('event_name', 'event_name', 'required');
		$this->form_validation->set_rules('event_des', 'event_des', 'required');
		$this->form_validation->set_rules('event_date', 'event_date', 'required|callback_is_valid_date');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header');
			$this->load->view('add_event');
			$this->load->view('template/footer');
		}
	}

	public function check_event() {

		print_r("11");
		echo "11";
	}


}
