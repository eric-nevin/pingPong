<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class twilioController extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('TwilioModel');
	}
	function index(){
		$this->TwilioModel->text_message();
		
 

	}
}