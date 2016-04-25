<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginnregModel extends CI_Model {
	function index()
	{
	}
	function login_user($user){
	$query= "SELECT id FROM users WHERE email= ? AND password=?";
	$values= array($user['email'], $user['password']);
	return $this->db->query($query, $values)->row_array();
	
	}
	function user_validation($new_user){
		$query="SELECT id FROM users WHERE email= ? ";
		$values= array($new_user['email']);
		return $this->db->query($query, $values)->row_array();
	}
	function register_user($user){
		$query= "INSERT INTO users(first_name, last_name, email, password) VALUES (?,?,?,?)";
		$values= array($user['first_name'], $user['last_name'], $user['email'], $user['password']);
		return $this->db->query($query, $values);
	}
	function get_user($id){
		$query= "SELECT id FROM users WHERE email= ?";
		return $this->db->query($query, $id)->row_array();
	}
}