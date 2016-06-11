<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboards extends CI_Model {
	function display_home_users($id){
		$query = "SELECT * FROM users LEFT JOIN scores ON users.id = scores.user_id LEFT JOIN groups ON groups.id = scores.group_id WHERE users.id = ?";
		$values = array($id);
		return $this->db->query($query, $values)->row_array();
	}
	function display_groups(){
		$query = "SELECT * FROM groups";
		return $this->db->query($query)->result_array();
	}
	function display_global_ladder(){
		$query= "SELECT * FROM users LEFT JOIN user_groups ON users.id = user_groups.user_id WHERE user_groups.group_id = 1 ORDER BY rank desc";
		return $this->db->query($query)->result_array();
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
	function add_group($group_info){
		$query = "INSERT INTO groups(stack, start_date) VALUES (?,?)";
		$values = array($group_info['stack'], $group_info['start_date']);
		return $this->db->query($query, $values);
	}
}