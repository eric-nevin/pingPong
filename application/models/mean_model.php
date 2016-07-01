<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mean_model extends CI_Model {
	function api_model($id){
		$query = "SELECT * FROM users WHERE id = ?";
		return $this->db->query($query, $id)->row_array();
	}
	function group_api_model($id){
		$query = "SELECT * FROM groups where id = ?";
		return $this->db->query($query, $id)->row_array();
	}
}

?>