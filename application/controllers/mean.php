<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mean extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Mean_model');
	}
	public function api(){
		$id = $this->session->userdata('id');
		$user = $this->Mean_model->api_model($id);
		$juser = json_encode($user);
		header('content-type: application/json; charset=utf-8');
		echo $_GET['callback'] . '('.$juser.')';
		
	}
	public function group_api($group_id){
		$group = $this->Mean_model->group_api_model($group_id);
		$jgroup = json_encode($group);
		header('content-type: application/json; charset=utf-8');
		echo $_GET['callback'] . '('.$jgroup.')';

	}
}
?>