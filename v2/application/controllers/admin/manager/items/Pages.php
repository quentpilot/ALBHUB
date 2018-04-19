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

	public function index() {
    // select pages into db following $hub var value
    // format model dump result with response class or else
		$views = array(
			'index',
			'../list',
			'../list',
		);
		$this->manager('pages', 'nav_menu');
		$this->manager('pages', 'list');
		//print_r($this->manager('pages', 'nav_menu'));
		//$this->pages_manager_model->dao('table');
		//$this->pages_manager_model->format('table');
		$this->render($views, $this->data);
	}

	public function config($page_id = 0) {
		$views = array(
			'../config',
		);
		$data = array(
			'data_nav_menu' => $this->pages_manager_model->nav_menu(),
			'data_form' => $this->pages_manager_model->form_config(),
			//'pagin_table' => $this->pages_manager_model->pagination(),
		);
		
		//$this->pages_manager_model->dao('table');
		//$this->pages_manager_model->format('table');
		$this->render($views, $data);
	}
}
