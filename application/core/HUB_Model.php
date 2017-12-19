<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HUB_Model extends MX_Model {

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

	protected $CI = null;
	protected $data = array();
	protected $database = null;
	protected $module_name = null;
	protected $layout = null;
	protected $objects = null;


	public function __construct($module = 'Welcome') {
		parent::__construct();
		$this->CI = &get_instance();
		$this->module_name = $module;
		$this->objects = array('User' => null, 'View' => null, 'Pojo' => null, 'Session' => null);
	}

	public function getData($key = null) {
		if (!is_null($key)) {
			if (array_key_exists($key, $this->data))
				return $this->data[$key];
		}
		return $this->data;
	}

	public function setData($key = null, $value = null) {
		if (!is_null($key) && !array_key_exists($key, $this->data))
			$this->data[$key] = $value;
		elseif (is_null($key) && count($value) > 0)
			$this->data = $value;
	}

	public function get($attribute = null) {
		if (property_exists(__CLASS__, $attribute))
			return $this->$attribute;
		return null;
	}

	public function set($attribute = null, $value = null) {
		if (property_exists(__CLASS__, $attribute)) {
			$this->$attribute = $value;
			return $value;
		}
		return null;
	}
}
