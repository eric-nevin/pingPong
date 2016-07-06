<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unicorn extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Unicorns');
	}
	public function display_admin() {
		$id = $this->session->userdata('id');
		if ($id != 5 && $id != 6) {
			redirect('/');
		}
		$active_groups = $this->Unicorns->get_active_groups();
		$data = array('active_groups' => $active_groups);
		$this->load->view('admin', $data);
	}
	public function add_group() {
		$id = $this->session->userdata('id');
		if ($id != 5 && $id != 6) {
			redirect('/');
		}
		$new_group = $this->input->post();
		$this->Unicorns->add_new_group($new_group);
		redirect('admin');
	}
	public function remove_active_group($group) {
		$id = $this->session->userdata('id');
		if ($id != 5 && $id != 6) {
			redirect('/');
		}
		$this->Unicorns->group_deactivate($group);
	}

}
