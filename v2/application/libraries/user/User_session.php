<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_session {
  public $usr_id = 0;
  public $usr_username = null;
  public $usr_email = null;
  public $usr_password = null;
  public $usr_valid_email = 0;
  public $usr_register_date = null;
  public $usr_last_log = null;
  public $usr_group_id = 1;
  public $usr_sta_id = 0;

  public function __construct(int $id = 0, string $username = null, string $email = null, string $password = null, int $valid_email = 0, $register_date = null, $last_log = null, int $group_id = 1, int $status_id = 0) {
    $this->usr_id = $id;
    $this->usr_username = $username;
    $this->usr_email = $email;
    $this->usr_password = $password;
    $this->usr_valid_email = $valid_email;
    $this->usr_register_date = $register_date;
    $this->usr_last_log = $last_log;
    $this->usr_group_id = $group_id;
    $this->usr_sta_id = $status_id;
  }

  public function copy(object $obj = null) : bool {
    if (is_null($obj))
      return false;

    $this->usr_id = $obj->usr_id;
    $this->usr_username = $obj->usr_username;
    $this->usr_email = $obj->usr_email;
    $this->usr_password = $obj->usr_password;
    $this->usr_valid_email = $obj->usr_valid_email;
    $this->usr_register_date = $obj->usr_register_date;
    $this->usr_last_log = $obj->usr_last_log;
    $this->usr_group_id = $obj->usr_group_id;
    $this->usr_sta_id = $obj->usr_sta_id;
    return true;
  }

  public function add(array $obj = array()) : bool {
    if (!is_array($obj) || !count($obj))
      return false;
    /*$this->id = $obj->id;
    $this->username = $obj->username;
    $this->email = $obj->email;
    $this->password = $obj->password;
    $this->valid_email = $obj->valid_email;
    $this->register_date = $obj->register_date;
    $this->last_log = $obj->last_log;
    $this->group_id = $obj->group_id;
    $this->status_id = $obj->status_id;*/
    return true;
  }

  public function copy_(object $obj = null) : bool {
    if (is_null($obj))
      return false;
    $attrs = get_object_vars($this);
    foreach($attrs as $attr => $type) {
      $attribute = $this->prefix.$attr;
      if (property_exists($obj, $attr)) {
        $this->$attr = $obj->$attr;
      } elseif (property_exists($obj, $attribute)) {
        $this->$attr = $obj->$attribute;
      }
    }
    return true;
  }

  public function with_prefix() : object {
    $obj = new User_session();
    $attrs = get_object_vars($this);
    foreach($attrs as $attr => $type) {
      $attribute = $this->prefix.$attr;
      if (property_exists($obj, $attr)) {
        $this->$attr = $obj->$attr;
      } elseif (property_exists($obj, $attribute)) {
        $this->$attr = $obj->$attribute;
      }
    }
    return $obj;
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
