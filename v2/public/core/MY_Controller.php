<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
   *
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

   protected $request = null;
   protected $view = null;

   public function __construct() {
     parent::__construct();
     $this->request = $this->req;
     $this->response = $this->res;
     $this->view = new Render(true);
     $this->_config();
   }

   protected function _config() {
     // set template dynamically from db or config file
     $this->config->set_item('tpl_public_name', 'albi-corporate');
   }

   public function render($view = 'index', $data = null, $return = false, $parser = true) {
     return $this->view->render($view, $data, $return, $parser);
   }

   public function request($query = null, $data = null, $type = null) {
     $this->request->query($query, $data, $type);
     return $this->request->result();
     //return $this->response();
   }
}

class MY_Admin_Controller extends MY_Controller {

	public function __construct() {
    parent::__construct();
		$this->_config();
  }

	protected function _config() {
		// set template dynamically from db or config file
		//$this->config->set_item('tpl_admin_name', 'admalbi');
	}
}
