<?php

/**
 * Datatable_builder aims to build dynamically class and properties related to tablename,
 * then store new class to libraries/tool/orm/database/tables/tablename_classname.php
 */

require_once APPPATH . 'libraries/tool/orm/builder/table/ITable_builder.php';

class Table_builder implements ITable_builder {

  public $configs = null;

  protected $ci = null;

  protected $tablename = null;

  protected $result = null;

  public function __construct(string $tablename = null) {
    $this->ci = &get_instance();
    $this->tablename = $tablename;
    $this->result = array();
  }

  public function build(string $tablename = null) : bool {
    $tablename = is_null($tablename) ? $this->tablename : $tablename;
    $this->tablename = $tablename;
    return $this->process();
  }

  public function process() : bool {
    return false;
  }

  public function format() : bool {
    // format result
    return false;
  }

  public function result() : array {
    return $this->result;
  }

  /**
  * get method would to return class attribute value entered as param
  */
  public function get(string $property) {
    if (is_null($property))
      return false;
    if (property_exists($this, $property))
      return $this->$property;
  }

  /**
  * set method would to set attribute choosen with wanted value
  */
  public function set(string $property, $value = null) {
    if (is_null($property))
      return false;
    if (property_exists($this, $property)) {
      $this->$property = $value;
      return $value;
    }
    return null;
  }
}
