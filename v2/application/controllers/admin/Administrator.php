<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends MY_Admin_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		//$this->load->view('welcome_message');
		$this->render();
	}

	public function manage($section) {
		$this->load->view('welcome_message');
	}

	public function section($type) {
		$this->load->view('welcome_message');
	}
}
