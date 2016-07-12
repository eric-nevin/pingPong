<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class twilioController extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('TwilioModel');
	}
	function index($texted_id){
		$id = $this->session->userdata('id');
		$texted_info = $this->TwilioModel->get_user($texted_id);
		$user_info = $this->TwilioModel->get_user($id);
		$this->TwilioModel->text_message($texted_info, $user_info);
		redirect("/view_profile/".$texted_id);	

	}
}