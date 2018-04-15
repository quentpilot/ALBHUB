<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/manager/setting/ISetting_manager.php';

class Setting_manager extends Tools_manager implements ISetting_manager {

  public function __construct(array $configs = array()) {
    parent::__construct($configs);
  }

  public function add(string $key, $item = null) : bool {
    $this->configs[$key] = $item;
    $this->result = $this->configs;
    return array_key_exists($key, $this->configs);
  }

  public function remove(string $key) : bool {
    if (!is_null($key) && array_key_exists($key, $this->configs)) {
      unset($this->configs[$key]);
      return true;
    }
    return false;
  }

  public function get_item(string $key = null) {
    if (!is_null($key) && array_key_exists($key, $this->configs))
      return $this->configs[$key];
    elseif (is_null($key) || !array_key_exists($key, $this->configs)) {
      return $this->configs;
    } else {
      return false;
    }
  }

  public function set_items(array $items) {
    foreach ($items as $key => $value) {
      $this->set($key, $value);
      $this->add($key, $value);
    }
    return true;
  }
}
