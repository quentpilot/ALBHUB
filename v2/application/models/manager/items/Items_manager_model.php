<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/manager/IManager_model.php';

class Items_manager_model extends MY_Manager_Model implements IManager_model {

  public function __construct(IDao_manager $dao = null, IFormat_manager $format = null, string $type = null) {
    parent::__construct($dao, $format, $type);
  }

  public function list(Items_manager_setting $configs = null) {
    $this->setting = is_null($configs) ? $this->setting : $configs;
    $tools = array('dao', 'format', 'dao', 'format');
    $types = array('table', 'table', 'pagination', 'pagination');
    $this->tools($tools, $types);
    return $this->result;
  }

  public function pagination(Items_manager_setting $configs = null) {
    $this->setting = is_null($configs) ? $this->setting : $configs;
    $tools = array('dao', 'format');
    $types = array('pagination', 'pagination');
    $this->tools($tools, $types);
    return $this->result;
  }

  public function settings_menu($config = null) {
    if (is_null($config)) return false;
  }

  public function save_button($config = null) {
    if (is_null($config)) return false;
  }

  public function cancel_button($config = null) {
    if (is_null($config)) return false;
  }

  public function back_button($config = null) {
    if (is_null($config)) return false;
  }

  public function item_button($config = null) {
    if (is_null($config)) return false;
  }

  public function _button($config = null) {
    if (is_null($config)) return false;
  }
}
