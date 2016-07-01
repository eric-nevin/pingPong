<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboards extends CI_Model {
	function display_user($id){
		$query = "SELECT * FROM users WHERE id = ?";
		return $this->db->query($query, $id)->row_array();
	}
	function display_home_users($id){
		$query = "SELECT * FROM users LEFT JOIN scores ON users.id = scores.user_id LEFT JOIN groups ON groups.id = scores.group_id WHERE users.id = ?";
		$values = array($id);
		return $this->db->query($query, $values)->result_array();
	}
	function display_current_group($id){
		$query = "SELECT * FROM groups LEFT JOIN user_groups ON groups.id = user_groups.group_id WHERE user_groups.user_id = ? ORDER BY id desc LIMIT 1";
		return $this->db->query($query, $id)->row_array();
	}
	function display_groups(){
		$query = "SELECT * FROM groups ORDER BY id desc LIMIT 3";
		return $this->db->query($query)->result_array();
	}
	function display_global_ladder(){
		$query = "SELECT * FROM users LEFT JOIN user_groups ON users.id = user_groups.user_id WHERE user_groups.group_id = 1 ORDER BY rank LIMIT 10";
		return $this->db->query($query)->result_array();
		
	}
	function display_global_score($id){
		$query = "SELECT * FROM scores WHERE user_id = ?";
		$all_scores = $this->db->query($query, $id)->result_array();
		$win_total = 0;
		$loss_total = 0;
		foreach ($all_scores as $values) {
			$win_total += $values['wins'];
			$loss_total += $values['losses'];
		}
		$returned = array($win_total, $loss_total);
		return $returned;
	}
	function display_user_list(){
		$query = "SELECT * FROM users WHERE availability = 1";
		return $this->db->query($query)->result_array();
	}
	function display_group_page_info($id){
		$query = "SELECT * FROM groups WHERE groups.id = ?";
		$values = array($id);
		return $this->db->query($query, $values)->row_array();
	}
	function display_group_page_users($id){
		$query = "SELECT * FROM users LEFT JOIN user_groups ON users.id = user_groups.user_id WHERE user_groups.group_id = ?";
		$values = array($id);
		return $this->db->query($query, $values)->result_array();
	}
	function display_group_ladder($id){
		$query = "SELECT * FROM user_groups LEFT JOIN users ON user_groups.user_id = users.id WHERE user_groups.group_id = ? ORDER BY rank LIMIT 5";
		return $this->db->query($query, $id)->result_array();
	}
	function add_group($group_info){
		$query = "INSERT INTO groups(stack, start_date) VALUES (?,?)";
		$values = array($group_info['stack'], $group_info['start_date']);
		return $this->db->query($query, $values);
	}
	function add_potential_game_db($user, $opponent, $user_group, $opponent_group, $info){
		if($info['winner'] == 'win'){
			$query = "INSERT INTO potential_scores(wins, losses, user_id, group_id, opponent_user_id, opponent_group_id) VALUES (1, 0, ?,?,?,?)";
			$values = array($user, $user_group, $opponent, $opponent_group);
			$this->db->query($query, $values);
		} else {
			$query = "INSERT INTO potential_scores(wins, losses, user_id, group_id, opponent_user_id, opponent_group_id) VALUES (0, 1, ?,?,?,?)";
			$values = array($user, $user_group, $opponent, $opponent_group);
			$this->db->query($query, $values);
		}
	}

	function add_game_db($potential){
		$query = "SELECT * FROM potential_scores WHERE potential_id = ?";
		$return = $this->db->query($query, $potential)->row_array();
		if($return['wins'] == 1){
			$winner = $return['user_id'];
			$loser = $return['opponent_user_id'];
			$win_id = $return['group_id'];
			$lose_id = $return['opponent_group_id'];
		} else {
			$loser = $return['user_id'];
			$winner = $return['opponent_user_id'];
			$lose_id = $return['group_id'];
			$win_id = $return['opponent_group_id'];
		}
		$query = "SELECT * FROM scores WHERE user_id = ? AND group_id = ? AND opponent_user_id = ? AND opponent_group_id = ?";
		$values= array($winner, $win_id, $loser, $lose_id);
		$winner_score = $this->db->query($query, $values)->row_array();
		$values = array($loser, $lose_id, $winner, $win_id);
		$loser_score = $this->db->query($query, $values)->row_array();

		if(empty($winner_score)){
			$query = "INSERT INTO scores(wins, losses, user_id, group_id, opponent_user_id, opponent_group_id) VALUES (1, 0, ?,?,?,?)";
			$values = array($winner, $win_id, $loser, $lose_id);
			$this->db->query($query, $values);
			$query = "INSERT INTO scores(wins, losses, user_id, group_id, opponent_user_id, opponent_group_id) VALUES (0, 1, ?,?,?,?)";
			$values = array($loser, $lose_id, $winner, $win_id);
			$this->db->query($query, $values);
		} else {
			$query = "UPDATE scores SET wins = ? WHERE user_id = ? AND group_id = ? AND opponent_user_id = ? AND opponent_group_id = ?";
			$winner_score['wins'] += 1;
			$values = array($winner_score['wins'], $winner, $win_id, $loser, $lose_id);
			$this->db->query($query, $values);

			$query = "UPDATE scores SET losses = ? WHERE user_id = ? AND group_id = ? AND opponent_user_id = ? AND opponent_group_id = ?";
			$loser_score['losses'] += 1;

			$values = array($loser_score['losses'], $loser, $lose_id, $winner, $win_id);
			$this->db->query($query, $values);
		}
		$query = "DELETE FROM potential_scores WHERE potential_id = ?";
		$this->db->query($query, $potential);

		$query = "SELECT * FROM user_groups WHERE user_id = ? AND group_id = 1";
		$winner_points = $this->db->query($query, $winner)->row_array();
		$loser_points = $this->db->query($query, $loser)->row_array();
		if($winner_points['points'] > $loser_points['points']){
			$query = "UPDATE user_groups SET points = ? WHERE user_id = ? AND group_id = 1";
			$new_points = $winner_points['points'] + 1;
			$values = array($new_points, $winner_points['user_id']);
			$this->db->query($query, $values);
			$new_points = $loser_points['points'] - 1;
			$values = array($new_points, $loser_points['user_id']);
			$this->db->query($query, $values);
		} else {
			$query = "UPDATE user_groups SET points = ? WHERE user_id = ? AND group_id = 1";
			$new_points = $winner_points['points'] + ($winner_points['rank'] - $loser_points['rank']);
			$values = array($new_points, $winner_points['user_id']);
			$this->db->query($query, $values);
			$new_points = $loser_points['points'] - ($winner_points['rank'] - $loser_points['rank']);
			$values = array($new_points, $loser_points['user_id']);
			$this->db->query($query, $values);
		}

	}
	
	function remove_potential($id){
		$query = "DELETE FROM potential_scores WHERE potential_id = ?";
		$this->db->query($query, $id);
	}
	function display_potential_games($id){
		$query = "SELECT * FROM potential_scores LEFT JOIN users ON users.id = potential_scores.user_id WHERE potential_scores.opponent_user_id = ?";
		return $this->db->query($query, $id)->result_array();
	}
	function add_invite($id, $invite_id){
		$query = "SELECT * FROM invites WHERE user_id = ? AND invited_id = ?";
		$values = array($id, $invite_id);
		$invite = $this->db->query($query, $values)->row_array();
		if(empty($invite)){
			$query = "INSERT INTO invites(user_id, invited_id, created_at) VALUES (?,?, NOW())";
			$this->db->query($query, $values);
			return true;
		} else {
			return false;
		}
	}
	function check_rank(){
		$rank = 1;
		$query = "SELECT * FROM user_groups ORDER BY user_groups.points desc";
		$user_groups = $this->db->query($query)->result_array();
		foreach($user_groups as $user){
			$query = "UPDATE user_groups SET rank = ? WHERE user_id = ?";
			$values = array($rank, $user['user_id']);
			$this->db->query($query, $values);
			$rank ++;
		}

	}
	function check_invite(){
		$query = "SELECT * FROM invites";
		$invites = $this->db->query($query)->result_array();
		$now = time();
		foreach($invites as $invite){
			$date = $invite['created_at'];
			$date = strtotime($date);
			$date = strtotime("+3 day", $date);
			if($date < $now){
				$query = "SELECT * FROM user_groups WHERE user_id = ? AND group_id = 1";
				$user_group = $this->db->query($query, $invite['invited_id'])->row_array();
				$new_points = $user_group['points'] - 2;
				$query = "UPDATE user_groups SET points = ? WHERE user_id = ? AND group_id = 1";
				$values = array($new_points, $user_group['user_id']);
				$this->db->query($query, $values);
				$query = "DELETE FROM invites WHERE id = ?";
				$this->db->query($query, $invite['id']);
			} 
		}
		
		
		
		
		
	}
}