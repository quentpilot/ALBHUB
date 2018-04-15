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
  protected $configs = null;
  protected $result = null;

  public function __construct($configs = null) {
    $this->ci = &get_instance();
    $this->configs = $configs;
  }

  public function load_result() {
    return $this->result;
  }

  /**
  * get method would to return class attribute value entered as param
  */
  public function get($property = null) {
    if (is_null($property))
      return false;
    if (property_exists($this, $property))
      return $this->$property;
  }

  /**
  * set method would to set attribute choosen with wanted value
  */
  public function set($property = null, $value = null) {
    if (is_null($property))
      return false;
    if (property_exists($this, $property)) {
      $this->$property = $value;
      return $value;
    }
    return null;
  }
}
