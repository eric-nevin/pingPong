<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unicorn extends CI_Controller {
	public function __contstruct(){
		parent:: __contstruct();
		$this->load->model('Unicorns');
	}
	public function display_admin() {
		$id = $this->session->userdata('id');
		if ($id != 5 && $id != 6) {
			redirect('/');
		}
		$this->load->view('admin');
	}
	public function add_group() {
		$new_group = $this->input->post();
		$this->Unicorns->add_new_group($new_group);
		redirect('unicorn');
	}

}
?>