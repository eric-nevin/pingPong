<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class loginnreg extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('LoginnregModel');
	}
	public function log_logged(){
		if($this->session->userdata('id')){
			redirect('home');
		}
		else {
		redirect('login');
		}
	}
	public function login(){
		$this->load->view('login_page');
	}
	public function registration(){
		$groups = $this->LoginnregModel->display_groups();
		$data = array('groups' => $groups);
		$this->load->view('registration_page', $data);
	}
	public function login_setup(){

		
		$user_info= $this->input->post();
		$login_user= $this->LoginnregModel->login_user($user_info);
		if($login_user){
			$this->session->set_userdata('id', $login_user['id']);

			// $id = $this->session->userdata('id');
			// $this->load->model('Dashboards');
			// $user = $this->Dashboards->display_user($id);
			// $jwt = JWT::encode(
   //      			$user,
   //      			$secretKey,
   //      			'HS512'
   //      	);
			// $unencoded = ['jwt' => $jwt];
			// $encoded = json_encode($unencoded);
			// $this->session->set_userdata('token', $unencoded);
			// var_dump($encoded);
			// die();

			redirect('/');
			} else {
			echo "There was an error with your login information";
		}
	}
	public function register_validation(){
		if(empty($this->input->post('first_name'))){
			$this->session->set_flashdata("error_first","Required Field.");
		}  
		if(empty($this->input->post('last_name'))){
			$this->session->set_flashdata("error_last","Required Field.");
		}
		if(empty($this->input->post('username'))){
			$this->session->set_flashdata("error_username","Required Field.");
		}  
		if(empty($this->input->post('email'))){
			$this->session->set_flashdata("error_email","Required Field.");
		} 
		if(empty($this->input->post('password'))){
			$this->session->set_flashdata("error_password","Required Field.");
		} 
		if(empty($this->input->post('cpassword')) ){
			$this->session->set_flashdata("error_cpassword","Required Field.");
		}
		if($this->input->post('password') !== $this->input->post('cpassword')){
			$this->session->set_flashdata("error_match","Passwords need to match.");
		}
		if(strlen($this->input->post('password')) < 6){
			$this->session->set_flashdata('error_length', 'Password too short');
		}
		if(empty($this->input->post('telephone'))){
			$this->session->set_flashdata("error_telephone","Required Field.");
		}
		$user_info = $this->input->post();
		$user_email = $user_info['email'];
		$this->session->set_userdata('useremail', $user_email);
		$register_validation = $this->LoginnregModel->user_validation($user_info);

		if($register_validation){
			
			$this->session->set_flashdata('error_user', 'This email already in use.');
		}
		if($this->session->userdata('error_first') || $this->session->userdata('error_last') || $this->session->userdata('error_username') || $this->session->userdata('error_email') || $this->session->userdata('error_password') || $this->session->userdata('error_cpassword') || $this->session->userdata('error_match') || $this->session->userdata('error_length') || $this->session->userdata('error_user')){
			redirect('registration');
		}

		$register_user= $this->LoginnregModel->register_user($user_info);
		if($register_user == TRUE){
				redirect('registerlogin');
			}
		}
	public function registerlogin(){
		$user_reg=$this->session->userdata('useremail');
		$login_id= $this->LoginnregModel->get_user($user_reg);
		$this->session->set_userdata('id', $login_id['id']);
		$this->session->unset_userdata('useremail');
		redirect('/');

	}


	public function logoff(){
		$this->session->unset_userdata('id');
		redirect('/');
	}
}
