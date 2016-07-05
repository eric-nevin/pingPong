<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unicorns extends CI_Model {
	function add_new_group($group) {
		$query = "INSERT INTO groups(stack, start_date) VALUES (?,?)";
		$values = array($group['name'], $group['month']);
		$this->db->query($query, $values);
	}
}
?>