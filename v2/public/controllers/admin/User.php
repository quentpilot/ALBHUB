<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Admin_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->render();
	}

	public function profile($user_id) {
		$data = array();
		$data = $this->user_model->get_user($user_id);
		//$data = array_merge($data, array('user_model' => $this->user_model));
		$this->render('profile', $data);
	}

	public function manage($section = null) {
		//$this->load->view('welcome_message');
	}

	public function section($type = null) {
		//$this->load->view('welcome_message');
	}
}
