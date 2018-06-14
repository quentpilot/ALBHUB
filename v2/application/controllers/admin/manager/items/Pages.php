<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Pages controller class would be a controller to manage main admin pages easily
*/

class Pages extends MY_Admin_Manager_Controller {

	public function __construct() {
		parent::__construct();
    $this->view->set('folder', 'manager/items/pages');
		$this->manager('pages', 'nav_menu');
	}

	public function index() {
    // select pages into db following $hub var value
    // format model dump result with response class or else
		$this->manager('pages', 'list');
		$this->render('index', $this->data);
	}

	public function add() {
		$this->manager('pages', 'form_edit');
		$this->manager('pages', 'form_edit_content');
		$this->manager('pages', 'form_edit_config');

		$entity = $this->data['data_form_edit']['entity'];

		$this->data['entity'] = $entity;
		$this->render('edit', $this->data);
	}

	public function edit($id = null) {
		$this->manager('pages', 'form_edit');
		$this->manager('pages', 'form_edit_content');
		//$this->manager('pages', 'form_edit_config');

		$entity = $this->data['data_form_edit']['entity'];

		if (!$entity->get('id')) {
			return $this->_error_404();
		}

		$this->data['entity'] = $entity;
		$this->render('edit', $this->data);
	}

	public function delete() {
		$views = array(
			'index',
			'../list',
			'../list',
		);
		$this->manager('pages', 'list');
		$this->render($views, $this->data);
	}

	public function active($id = null) {
		$this->manager('pages', 'active');
		redirect('admin/manager/items/pages');
	}

	public function list($api_config = null) {
		// if API configs, load related view data (array on PHP, Json, CSV, SQl, XML, HTML)
		// else, it's an admin action on manager so load a datatable view
		//redirect('admin/manager/items/pages/index');
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

	public function export() {

	}
}
