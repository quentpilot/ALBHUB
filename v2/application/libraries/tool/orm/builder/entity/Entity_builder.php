<?php

/**
 * Datatable_builder aims to build dynamically class and properties related to tablename,
 * then store new class to libraries/tool/orm/database/tables/tablename_classname.php
 */

require_once APPPATH . 'libraries/tool/orm/builder/entity/IEntity_builder.php';

class Entity_builder implements IEntity_builder {

  public $configs = null;

  public $tablename = null;

  public $classname = null;

  public $delim = null;

  public $repository = null;

  protected $builder = null;

  protected $result = null;

  protected $ci = null;

  public function __construct(string $tablename = null, string $classname = null, string $repository = null, $delim = '_') {
    //$this->ci = &get_instance();
    $this->tablename = $tablename;
    $this->classname = $classname;
    $this->repository = $repository;
    $this->delim = $delim;
    $this->builder = new Datatable_builder();
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

  public function format(array $obj_db_result = array()) : bool {
    $result = array();

    foreach ($obj_db_result as $entity) {
      if (is_object($entity))
        $entity = $this->create_object($entity);
      elseif (is_array($entity))
        $entity = $this->create_array($entity);
      $result[] = $entity;
    }

    $this->result = $result;
    return true;
  }

  protected function create_array(array $entity) {
    $result = array();
    foreach ($entity as $key => $value) {
      $exp = explode('_', $key);
      $index = $exp[0];
      unset($exp[0]);
      $name = implode('_', $exp);
      $result[$name] = $value;
    }
    //echo $this->classname;
    $this->builder->set('type', 'entities');
    $this->builder->build($this->tablename, $this->classname);
    $entity = $this->builder->object;
    //debug($entity);
    $result = $entity;
    return $result;
  }

  protected function create_object(object $entity) {
    return $entity->itm_id;
  }

  public function result() {
    /*if ($this->queries->execute())
      $this->result = $this->queries->get('ci_result');*/
    //$this->result = $this->classname;
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
