<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widgets extends MY_Admin_Manager_Controller {

	public function __construct() {
		parent::__construct();
    $this->view->set('folder', 'manager/items/widgets');
	}

	public function index() {
		$this->render();
	}
}
