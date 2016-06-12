<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Dashboards');
	}
	public function display_home(){
		$id = $this->session->userdata('id');
		$groups = $this->Dashboards->display_groups();
		$user_info = $this->Dashboards->display_home_users($id);
		$global_ladder = $this->Dashboards->display_global_ladder();
		$global_score = $this->Dashboards->display_global_score($id);
		$data = array('user_info' => $user_info, 'global_ladder' => $global_ladder, 'groups' => $groups, 'global_score' => $global_score);
		$this->load->view('home', $data);
	}
	public function display_all_users(){
		$user_list = $this->Dashboards->display_user_list();
		$data = array('user_list' => $user_list);
		$this->load->view('users', $data);
	}
	public function display_group_page($group_id){
		$group_info = $this->Dashboards->display_group_page_info($group_id);
		$group_users = $this->Dashboards->display_group_page_users($group_id);
		$data = array('group_info' => $group_info, 'group_users' => $group_users);
		$this->load->view('group', $data);
	}
	public function display_other_profile($user_id){
		$user_info = $this->Dashboards->display_home_user($user_id);
		$global_ladder = $this->Dashboards->display_global_ladder();
		$data = array('user_info' => $user_info, 'global_ladder' => $global_ladder);
		$this->load->view('home', $data);
	}
	public function create_group(){
		// for admin use
		$group_info = $this->input->post();
		$this->Dashboards->add_group($group_info);
	}
}