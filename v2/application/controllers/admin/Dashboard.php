<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Admin_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		//print_r($this->session->userdata('username'));
		$this->render();
	}

	public function manage($section = null, $view = null) {
		$this->render();
	}

	public function section($type = null) {
	}
}
