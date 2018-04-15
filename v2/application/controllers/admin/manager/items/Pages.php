<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Pages controller class would be a controller to manage main admin pages easily
*/

class Pages extends MY_Admin_Manager_Controller {

	public function __construct() {
		parent::__construct();
    $this->view->set('folder', 'manager/items/pages');
	}

	public function index($hub = null) {
    // select pages into db following $hub var value
    // format model dump result with response class or else
		$data = array(
			'data_table' => $this->pages_manager_model->list(),
			//'pagin_table' => $this->pages_manager_model->pagination(),
		);
		//$this->pages_manager_model->dao('table');
		//$this->pages_manager_model->format('table');
		$this->render('index', $data);
	}
}
