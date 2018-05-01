<?php

/**
 *
 */

require_once APPPATH . 'libraries/tool/orm/entity/IORM_entity.php';

class Table_entity implements IORM_entity {

  public $tablename = null;

  public $rules = null;

  public $entiy_builder = null;

  public $table_builder = null;

  public $result = null;

  public function __construct(string $tablename = null, $rules = null, IEntity_builder $entity_builder = null, IDatatable_builder $table_builder = null) {
    $this->tablename = $tablename;
    $this->rules = $rules;
    $this->entity_builder = new Entity_builder();
    $this->table_builder = new Datatable_builder();
    $this->result = null;
  }

  public function build() {
    return false;
  }

  public function factory($rules = null) {
    return $this;
  }

  public function copy($rules = null) {
    return $this;
  }

  public function result($rules = null) {
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
