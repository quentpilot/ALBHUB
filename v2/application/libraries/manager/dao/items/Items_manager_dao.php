<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/manager/dao/IDao_manager.php';

class Items_manager_dao extends Tools_manager implements IDao_manager {

  protected $orm = null;
  protected $pojo = null;
  protected $db = null;

  public function __construct(Items_manager_setting $configs = null) {
    parent::__construct($configs);
    $type = $this->ci->uri->segment(4);
    $type = ucfirst(substr($type, 0, strlen($type) -1));
    if (class_exists($type))
      $this->pojo = new $type();
    $this->db = $this->ci->db;
    $this->orm = $this->ci->orm;
  }

  public function build() {
    $this->result = 'built';
    return true;
  }

  public function load_item(Items_manager_setting $configs = null) {
    $this->ci = &get_instance();
    $this->configs = $configs;
    $this->result = 'item loaded';
    return true;
  }

  public function load_nav_menu(Items_manager_setting $configs = null) {
    $this->set_configs($configs);
    $this->result = $this->pojo;
    $this->configs->add('dao.nav_menu', array('pojo' => $this->pojo, 'status' => 'table done'));
    //echo $this->configs->type;
    return true;
    // process to get configs data through database then build as result objects types
  }

  public function load_table(Items_manager_setting $configs = null) {
    $this->ci = &get_instance();
    $this->configs = $configs;
    $this->result = $this->pojo;
    $this->configs->add('dao.table', array('pojo' => $this->pojo, 'status' => 'table done'));
    return true;
    // process to get configs data through database then build as result objects types
  }

  public function load_pagination(Items_manager_setting $configs = null) {
    $this->ci = &get_instance();
    $this->configs = $configs;
    $this->configs->add('dao.pagin', 'pagination done');
    $this->result = 'pagination loaded';
    return true;
  }

  public function load_form_config(Items_manager_setting $configs = null) {
    $this->ci = &get_instance();
    $this->configs = $configs;
    $this->result = $this->pojo;
    $this->configs->add('dao.form_config', array('pojo' => $this->pojo, 'status' => 'form_config done'));
    //echo __CLASS__;
    return true;
    // process to get configs data through database then build as result objects types
  }

  public function set_configs($configs = null, bool $new_ci = false) : bool {
    if ($new_ci)
      $this->ci = &get_instance();
    if (!$configs instanceof Items_manager_setting)
      return false;
    $this->configs = is_null($configs) ? $this->configs : $configs;
    return true;
  }
}
