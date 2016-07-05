<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginnregModel extends CI_Model {
	
	function login_user($user){
	$query = "SELECT id FROM users WHERE email= ? AND password=?";
	$values = array($user['email'], $user['password']);
	return $this->db->query($query, $values)->row_array();
	
	}
	function user_validation($new_user){
		$query = "SELECT id FROM users WHERE email= ? ";
		$values = array($new_user['email']);
		return $this->db->query($query, $values)->row_array();

	}
	function register_user($user){
		$query = "INSERT INTO users(first_name, last_name, username, email, password, phone_number) VALUES (?,?,?,?,?,?)";
		$values = array($user['first_name'], $user['last_name'], $user['username'], $user['email'], $user['password'], $user['telephone']);
		$this->db->query($query, $values);
		$query = "SELECT id FROM users WHERE email = ?";
		$values = array($user['email']);
		$new_id = $this->db->query($query, $values)->row_array();
		$query = "SELECT * FROM user_groups WHERE group_id = ? ORDER BY rank desc LIMIT 1";
		$values = array($user['stack']);
		$last_rank = $this->db->query($query, $values)->row_array();
		$new_rank = $last_rank['rank'] + 1;
		$query = "INSERT INTO user_groups(group_id, user_id, rank, points) VALUES (?,?,?,0)";
		$values = array($user['stack'], $new_id['id'], $new_rank);
		$this->db->query($query, $values);
		return true;
		
	}
	function get_user($id){
		$query = "SELECT id FROM users WHERE email = ?";
		return $this->db->query($query, $id)->row_array();
	}
	function display_groups(){
		$query = "SELECT * FROM groups LIMIT 3";
		return $this->db->query($query)->result_array();
	}
}