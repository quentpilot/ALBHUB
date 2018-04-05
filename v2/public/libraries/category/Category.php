<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category {

  protected $id = 0;
  protected $name = null;
  protected $alias = null;
  protected $status_id = 0;

  public function __construct(int $id = 0, string $name = null, string $alias = null, int $status_id = 0) {
    $this->id = $id;
    $this->name = $name;
    $this->alias = $alias;
    $this->status_id = $status_id;
  }

  /**
  * get method would to return class attribute value entered as param
  */
  public function get($property) {
    if (is_null($property))
      return false;
    if (property_exists($this, $property))
      return $this->$property;
  }

  /**
  * set method would to set attribute choosen with wanted value
  */
  public function set($property, $value = null) {
    if (is_null($property))
      return false;
    if (property_exists($this, $property)) {
      $this->$property = $value;
      return $value;
    }
    return null;
  }
}
