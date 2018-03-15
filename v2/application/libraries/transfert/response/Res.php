<?php

require_once APPPATH . 'libraries/transfert/ITransfert.php';

class Res implements ITransfert {

  protected $query = null;

  protected $data = null;

  protected $type = null;

  protected $result = null;

  protected $protocol = null;

  protected $error = null;

  public function __construct($data = null, $type = null, $protocol = null) {
    $this->data = $data;
    $this->type = $type;
    $protocol = (is_null($protocol)) ? new Protocol() : $protocol;
  }

  public function result($query = null, $data = null, $type = null) {
    $this->query = $query;
    $this->data = $data;
    $this->type = $type;
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
