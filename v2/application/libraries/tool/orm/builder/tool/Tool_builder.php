<?php

/**
 * Datatable_builder aims to build dynamically class and properties related to tablename,
 * then store new class to libraries/tool/orm/database/tables/tablename_classname.php
 */

require_once APPPATH . 'libraries/tool/orm/builder/tool/ITool_builder.php';

class Tool_builder implements ITool_builder {

  public $configs = null;

  public $tablename = null;

  public $classname = null;

  public $repository = null;

  protected $result = null;

  protected $ci = null;

  public function __construct(string $tablename = null, string $classname = null, string $repository = null) {
    $this->ci = &get_instance();
    $this->tablename = $tablename;
    $this->classname = $classname;
    $this->repository = $repository;
    $this->result = null;
  }

  public function build(string $tablename = null, $classname = null) {
    $tablename = is_null($tablename) ? $this->tablename : $tablename;
    $classename = is_null($classname) ? $this->classname : $classname;
    $this->tablename = $tablename;
    $this->classname = $classname;
    return $this->process();
  }

  public function process() : bool {
    return false;
  }

  public function format() : bool {
    return false;
  }

  public function result() {
    /*if ($this->queries->execute())
      $this->result = $this->queries->get('ci_result');*/
    $this->result = $this->classname;
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
