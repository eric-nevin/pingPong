<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unicorns extends CI_Model {
	function add_new_group($group) {
		$query = "INSERT INTO groups(stack, start_date, active) VALUES (?,?, 1)";
		$values = array($group['name'], $group['month']);
		$this->db->query($query, $values);
	}

	function get_active_groups() {
		$query = "SELECT * FROM groups WHERE active = 1";
		return $this->db->query($query)->result_array();
	}
	function group_deactivate($id) {
		$query = "UPDATE groups SET active = 0 WHERE id = ?";
		$this->db->query($query, $id);
	}
}
