<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Tools_manager library class would to be a parent of a class used as toolbox
* to easily custom and build models data and format data before to use it through wanted views
*
* @see Items_manager_model
*/

require_once APPPATH . 'libraries/manager/ITools_manager.php';

class Tools_manager implements ITools_manager {

  protected $ci = null;
  protected $orm = null;
  protected $configs = null;
  protected $result = null;
  protected $errors = null;

  public function __construct($configs = null) {
    $this->ci = &get_instance();
    $this->configs = $configs;
  }

  public function set_configs($configs = null, bool $new_ci = false) : bool {
    if ($new_ci)
      $this->ci = &get_instance();
    if (!$configs instanceof ISetting)
      return false;
    $this->configs = is_null($configs) ? $this->configs : $configs;
    return true;
  }

  public function load_result() {
    return $this->result;
  }

  public function load_views(array $views = array()) {
    $views = count($views) ? $views : array('render.views');
    $this->configs->set_views($views);
    $views = $this->configs->get_item('render.views');
    return $views;
  }

  /**
  * get method would to return class attribute value entered as param
  */
  public function get(string $property = null) {
    if (is_null($property))
      return false;
    if (property_exists($this, $property))
      return $this->$property;
  }

  /**
  * set method would to set attribute choosen with wanted value
  */
  public function set(string $property = null, $value = null) {
    if (is_null($property))
      return false;
    if (property_exists($this, $property)) {
      $this->$property = $value;
      return $value;
    }
    return null;
  }
}
