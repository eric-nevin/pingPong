<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Dashboards');
	}
	public function display_home(){
		$id = $this->session->userdata('id');
		$this->Dashboards->check_invite();
		$this->Dashboards->check_rank();
		$groups = $this->Dashboards->display_groups();
		$user_info = $this->Dashboards->display_user($id);
		$global_ladder = $this->Dashboards->display_global_ladder();
		$global_score = $this->Dashboards->display_global_score($id);
		$current_group = $this->Dashboards->display_current_group($id);
		$potenial_games = $this->Dashboards->display_potential_games($id);
		$data = array('user_info' => $user_info, 'global_ladder' => $global_ladder, 'groups' => $groups, 'global_score' => $global_score, 'current_group' => $current_group, 'potential_games' => $potenial_games);
		$this->load->view('home', $data);
	}
	public function display_all_users(){
		$user_list = $this->Dashboards->display_user_list();
		$data = array('user_list' => $user_list);
		$this->load->view('users', $data);
	}
	// public function dispplay_all_groups(){
	// 	$group_list = $this->Dashboards->display_groups();

	// }
	public function display_group_page($group_id){
		$group_info = $this->Dashboards->display_group_page_info($group_id);
		$group_users = $this->Dashboards->display_group_page_users($group_id);
		$group_ladder = $this->Dashboards->display_group_ladder($group_id);
		$data = array('group_info' => $group_info, 'group_users' => $group_users, 'group_ladder' => $group_ladder);
		$this->load->view('group', $data);
	}
	public function display_other_profile($user_id){
		$id = $this->session->userdata('id');
		$user_info = $this->Dashboards->display_home_users($user_id);
		$current_group = $this->Dashboards->display_current_group($user_id);
		$global_score = $this->Dashboards->display_global_score($user_id);
		$global_ladder = $this->Dashboards->display_global_ladder();
		$data = array('user_info' => $user_info, 'global_score' => $global_score, 'current_group' => $current_group, 'global_ladder' => $global_ladder);
		if($id == $user_id){
			redirect('/home');
		} else {
			$this->load->view('other_users', $data);
		}
	}
	public function display_add_game($opponent_id){
		$id = $this->session->userdata('id');
		$user_info = $this->Dashboards->display_home_users($opponent_id);
		$my_user_info = $this->Dashboards->display_user($id);
		$current_group = $this->Dashboards->display_current_group($opponent_id);
		$global_score = $this->Dashboards->display_global_score($opponent_id);
		$global_ladder = $this->Dashboards->display_global_ladder();
		$data = array('user_info' => $user_info, 'global_score' => $global_score, 'current_group' => $current_group, 'global_ladder' => $global_ladder, 'my_user_info' => $my_user_info);
		$this->load->view('game_form', $data);
	}
	public function display_add_accept_game($opponent_id, $invite_id){
		$id = $this->session->userdata('id');
		$user_info = $this->Dashboards->display_home_users($opponent_id);
		$my_user_info = $this->Dashboards->display_user($id);
		$current_group = $this->Dashboards->display_current_group($opponent_id);
		$global_score = $this->Dashboards->display_global_score($opponent_id);
		$global_ladder = $this->Dashboards->display_global_ladder();
		$data = array('user_info' => $user_info, 'global_score' => $global_score, 'current_group' => $current_group, 'global_ladder' => $global_ladder, 'my_user_info' => $my_user_info, 'invite_game' => $invite_id);
		$this->load->view('game_form', $data);
	}










	public function add_potential_game(){
		$id = $this->session->userdata('id');
		$current_group = $this->Dashboards->display_current_group($id);
		$info = $this->input->post();


		if (isset($info['invite_game'])){
			$this->Dashboards->add_potential_game_db($id, $info['opponent_id'], $current_group['group_id'], $info['opponent_group'], $info);
			$this->session->set_flashdata('add_game_success', 'Successfully added game');
			$this->Dashboards->remove_invite($info['invite_game']);
			redirect("view_profile/".$info['opponent_id']."");
		}
		else{
			$this->Dashboards->add_potential_game_db($id, $info['opponent_id'], $current_group['group_id'], $info['opponent_group'], $info);
			$this->session->set_flashdata('add_game_success', 'Successfully added game');
			redirect("view_profile/".$info['opponent_id']."");
		}
	}




	public function display_notifications(){
		$id = $this->session->userdata('id');
		$potential_games = $this->Dashboards->display_potential_games($id);
		$invites = $this->Dashboards->get_all_invites($id);

		$data = array('potential_games' => $potential_games, 'invites' => $invites);
		$this->load->view('notifications', $data);
	}

	public function display_chat($group_id){
		$id = $this->session->userdata('id');
		redirect("http://localhost:8000/#/chatroom/".$id."/".$group_id."");
	}

	public function confirmed(){
		$potential = $this->input->post();
		if(isset($potential['confirm'])){
			$this->Dashboards->add_game_db($potential['potential']);
		} else {
			$this->Dashboards->remove_potential($potential['potential']);
		}
		redirect('/notifications');
	}

	public function add_invite($invite_id){
		$id = $this->session->userdata('id');
		$invite = $this->Dashboards->add_invite($id, $invite_id);
		if($invite == false){
			$this->session->set_flashdata('invite', 'Already invited to game');
		} else {
			$this->session->set_flashdata('invite', 'Successfully invited to game');
		}
		redirect("/view_profile/".$invite_id);
	}

//
	public function create_group(){
		// for admin use
		$group_info = $this->input->post();
		$this->Dashboards->add_group($group_info);

	}

	public function decline($id){
		$this->Dashboards->remove_invite($id);
		redirect("/notifications");
	}
}