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

   public function __construct($template_name = null) {
     parent::__construct();
     $this->request = $this->req;
     $this->response = $this->res;
     $this->view = new Render(true);
     $this->_config($template_name);
   }

   protected function _config($template_name = null) {
     // set template dynamically from db or config file
     if (!is_null($template_name))
 		  $this->config->set_item('tpl_public_name', $template_name);
     else
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

	public function __construct($template_name = null) {
    parent::__construct();
    $this->_connect();
		$this->_config($template_name);
  }

  protected function _connect() {
    //$this->user_log->set('status', 1);
    if (!$this->user_log->is_loged() && (($this->uri->rsegment(1) != 'user') || ($this->uri->rsegment(2) == 'profile')))
      redirect('admin/user/login');
  }

	protected function _config($template_name = null) {
		// set template dynamically from db or config file
    if (!is_null($template_name))
		  $this->config->set_item('tpl_admin_name', $template_name);
    else
      $this->config->set_item('tpl_admin_name', 'admalbi');
	}
}
