<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Admin_Controller extends MY_Controller {

	public function __construct() {
    parent::__construct();
		$this->_config();
  }

	protected function _config() {
		// set template dynamically from db or config file
		$this->config->set_item('tpl_admin_name', 'admalbi');
	}
}
