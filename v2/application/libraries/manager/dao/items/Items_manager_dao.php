<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/manager/dao/IDao_manager.php';

class Items_manager_dao extends Tools_manager implements IDao_manager {

  protected $pojo = null;
  protected $db = null;

  public function __construct(Items_manager_setting $configs = null) {
    parent::__construct($configs);
    $type = $this->ci->uri->segment(4);
    $type = ucfirst(substr($type, 0, strlen($type) -1));
    if (class_exists($type))
      $this->pojo = new $type();
    $this->db = $this->ci->db;
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

  public function load_table(Items_manager_setting $configs = null) {
    $this->ci = &get_instance();
    $this->configs = $configs;
    $this->configs->add('dao.table', 'table done');
    $this->result = $this->pojo;
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
}
