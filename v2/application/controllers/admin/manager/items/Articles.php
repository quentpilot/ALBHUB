<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends MY_Admin_Manager_Controller {

	public function __construct() {
		parent::__construct();
    $this->view->set('folder', 'manager/items/articles');
	}

	public function index() {
		$this->render();
	}
}
