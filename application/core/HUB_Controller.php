<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hub_Controller extends MX_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	protected $vars = array();
	protected $file = null;
	protected $path = null;

	public function __construct($module = null, $template_name = 'alb') {
		parent::__construct();
		is_null($module) ? $module = 'Welcome' : $module = $module;
		$this->vars['module'] = $module;
		$this->vars['template'] = strtolower($template_name);
		$this->vars['models'] = array(strtolower($module).'_model');
		$this->vars['objects'] = array('User' => null, 'Hub' => null, 'DAO' => null);
		$this->vars['view'] = 'modules/'.$module.'/';
		$this->vars['lib'] = 'asset/lib/templates/'.$template_name;
		$this->vars['content'] = null;
		$this->vars['style_import'] = array('css' => null);
		$this->vars['script_import'] = array('js' => null);
		$this->vars['config'] = array('Hub' => null, 'Session' => null);
		$this->file = 'layout';
		$this->path = "modules/$module/" . $this->file ;
	}

	public function getVars($key = null) {
		if (!is_null($key)) {
			if (array_key_exists($key, $this->vars))
				return $this->vars[$key];
		}
		return $this->vars;
	}

	public function setVars($key = null, $value = null) {
		if (!is_null($key) && !array_key_exists($key, $this->vars))
			$this->vars[$key] = $value;
		elseif (is_null($key) && count($value) > 0)
			$this->vars = $value;
	}

	public function loadpath() {
		$this->path = 'modules/' . $this->vars['module'] . '/' . $this->file;
		return $this->path;
	}

	public function render($view = 'layout', $data = null, $return = false) {
		if (is_null($view))
			$view = 'layout';
		if (is_null($data))
			$data = $this->vars;
		$this->vars['view'] = $view;
		$this->vars['content'] =  $this->load->view($view, $data, true);
		if ($return)
			return $this->vars['content'];
		$this->load->view($view, $data, $return);
		return true;
	}
}
