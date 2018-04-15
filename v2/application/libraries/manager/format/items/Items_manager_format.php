<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/manager/format/IFormat_manager.php';

class Items_manager_format extends Tools_manager implements IFormat_manager {

  protected $view_file = null;

  protected $file_data = null;

  public function __construct(Items_manager_setting $configs = null) {
    parent::__construct($configs);
    $this->view_file = $this->ci->uri->segment(4);
    $this->file_data = array('table_data_format' => array('title' => $this->view_file));
  }

  public function format() {
    return 'formated';
  }

  public function load_table(Items_manager_setting $configs = null) {
    $this->ci = &get_instance();
    $this->configs = $configs;
    $this->configs->add('format.table', 'table done');
    $this->result = 'table formatted';
    return true;
  }

  public function load_pagination(Items_manager_setting $configs = null) {
    $this->ci = &get_instance();
    $this->configs = $configs;
    $this->configs->add('format.pagin', 'pagination done');
    $this->result = 'pagination formatted';
    return true;
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
