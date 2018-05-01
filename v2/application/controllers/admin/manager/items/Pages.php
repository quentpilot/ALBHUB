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
		);
		$this->manager('pages', 'nav_menu');
		$this->manager('pages', 'list');
		//print_r($this->manager('pages', 'nav_menu'));
		//$this->pages_manager_model->dao('table');
		//$this->pages_manager_model->format('table');
		//$res = $this->db->query("SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'usr_users'")->result();
		//print_r($res);
		//$res = $this->orm->new_datatable('usr_users', true);
		//debug($res);
		//debug($this->orm->refresh(array(), true));
		$this->render($views, $this->data);
	}

	public function add() {
		$views = array(
			'index',
			'../list',
			'../list',
		);
		$this->manager('pages', 'nav_menu');
		$this->manager('pages', 'list');
		$this->render($views, $this->data);
	}

	public function edit() {
		$views = array(
			'index',
			'../list',
			'../list',
		);
		$this->manager('pages', 'nav_menu');
		$this->manager('pages', 'list');
		$this->render($views, $this->data);
	}

	public function delete() {
		$views = array(
			'index',
			'../list',
			'../list',
		);
		$this->manager('pages', 'nav_menu');
		$this->manager('pages', 'list');
		$this->render($views, $this->data);
	}

	public function list($api_config = null) {
		// if API configs, load related view data (array on PHP, Json, CSV, SQl, XML, HTML)
		// else, it's an admin action on manager so load a datatable view
		$views = array(
			'index',
			'../list',
			'../list',
		);
		$this->manager('pages', 'nav_menu');
		$this->manager('pages', 'list');
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
