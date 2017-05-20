<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imageloader extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url','util_helper'));
        //echo "lklklkl";
    }
	 

	



	public function index() {		
		$this->load->view('imageuploader');
	}



	public function do_upload() {
		$this->load->library("UploadHandler");

		//$this->load->view('imageuploader');
	}




	

	


}
