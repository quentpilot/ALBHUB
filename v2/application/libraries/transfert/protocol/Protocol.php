<?php

require_once APPPATH . 'libraries/transfert/ITransfert.php';

class Protocol implements ITransfert {

  protected $rules = null;

  public function __construct($rules = null) {
    $this->rules = $rules;
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
