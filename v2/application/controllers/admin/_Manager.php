<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class _Manager extends MY_Admin_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		//$this->render();
	}

	public function manage($section = null) {
		debug(array('coucou'));
		$this->render();
	}

	public function section($type = null) {
		$this->render();
	}

	public function hub($type = null) {
		$this->render();
	}

	public function enterprise($type = null) {
		$this->render();
	}

	public function display($type = null) {
		$this->render();
	}

	public function config($type = null) {
		$this->render();
	}
}
