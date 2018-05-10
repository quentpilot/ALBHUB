<?php

/**
 *
 */

require_once APPPATH . 'libraries/tool/orm/entity/IORM_entity.php';

class Table_entity implements IORM_entity {

  public $classname = null;

  public $tablename = null;

  public $prefix = null;

  public $delim = null;

  public $rules = null;

  public $entiy_builder = null;

  public $table_builder = null;

  public $query_builder = null;

  public $ci_result = null;

  public $result = null;

  public function __construct(string $tablename = null, $rules = null, IEntity_builder $entity_builder = null, IDatatable_builder $table_builder = null) {
    $this->tablename = $tablename;
    $this->delim = '_';
    $this->prefix = (strlen($tablename) == 3) ? $tablename : explode($this->delim, $tablename)[0];
    $this->classname = explode($this->delim, get_class($this))[0];
    $this->rules = $rules;
    $this->entity_builder = new Entity_builder(); // fill and use db table object related to entity
    $this->table_builder = new Datatable_builder($this->tablename); // build db table as PHP object
    $this->query_builder = new Dataquery_builder(); // build queries and executes requests to return db result
    $this->ci_result = null;
    $this->result = null;
  }

  public function build() {
    if ($this->process()) {
      return true;
    }
    return false;
  }

  public function process() {
    $this->hydrate(array());
    return false;
  }

  public function factory($config = array()) {
    $pre = $this->prefix();
    $config[0][$pre.'id'] = 0;
    $this->hydrate($config);
    return $this;
  }

  public function find() {
    return null;
  }

  public function copy($object = null, IORM_database $entity = null) {
    $this->result = $entity->dump($object);
    return $this;
  }

  public function result($rules = null) {
    return $this->result;
  }

  public function hydrate(array $ci_result = array()) {
    $this->table_builder->type = 'entities';
    $this->table_builder->classname = $this->classname;
    $entity = $this->table_builder->refresh_datatables(array($this->tablename), true)[0];

    if ($entity) {
      $entity->tb_id = $this->prefix($this->prefix());
      $entity->tb_name = $this->tablename;
      $entity->tb_primary_key = 'id';
      if (!count($ci_result)) $ci_result[] = array($entity->tb_id . $entity->tb_primary_key => 0);
      $this->ci_result = $ci_result;
      $ci_result = $ci_result[0];
      return $this->copy($ci_result, $entity);
    }
    return null;
  }

  public function fill(array $ci_result = array()) {
    return $this->hydrate($ci_result);
  }

  public function feed(array $ci_result = array()) {
    return $this->fill($ci_result);
  }

  protected function prefix() {
    $prefix = $this->prefix . $this->delim;
    return $prefix;
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
