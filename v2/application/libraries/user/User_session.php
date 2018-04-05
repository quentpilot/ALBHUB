<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_session {
  public $id = 0;
  public $username = null;
  public $email = null;
  public $password = null;
  public $valid_email = 0;
  public $register_date = null;
  public $last_log = null;
  public $group_id = 1;
  public $status_id = 0;

  public function __construct(int $id = 0, string $username = null, string $email = null, string $password = null, int $valid_email = 0, $register_date = null, $last_log = null, int $group_id = 1, int $status_id = 0) {
    $this->id = $id;
    $this->username = $username;
    $this->email = $email;
    $this->password = $password;
    $this->valid_email = $valid_email;
    $this->register_date = $register_date;
    $this->last_log = $last_log;
    $this->group_id = $group_id;
    $this->status_id = $status_id;
  }

  public function copy(object $obj = null) : bool {
    if (is_null($obj))
      return false;
    $this->id = $obj->id;
    $this->username = $obj->username;
    $this->email = $obj->email;
    $this->password = $obj->password;
    $this->valid_email = $obj->valid_email;
    $this->register_date = $obj->register_date;
    $this->last_log = $obj->last_log;
    $this->group_id = $obj->group_id;
    $this->status_id = $obj->status_id;
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
