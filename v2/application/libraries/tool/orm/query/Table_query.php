<?php

/**
 *
 */

require_once APPPATH . 'libraries/tool/orm/query/IORM_query.php';

class Table_query implements IORM_query {

  public $tablename = null;

  public $data = null;

  public $query_string = null;

  public $query_builder = null;

  public $table_builder = null;

  public $result = null;

  public function __construct(string $tablename = null, $rules = null) {
    $this->tablename = $tablename;
    $this->data = $rules;
    $this->query_builder = new Query_builder();
    $this->table_builder = new Table_builder();
    $this->result = new Table_result();
  }

  public function build() {
    return false;
  }

  public function select(string $tablename = null, $data = null) {
    $this->set($tablename);
    return $this;
  }

  public function insert(string $tablename = null) {
    $this->set($tablename);
    return $this;
  }

  public function update(string $tablename = null) {
    $this->set($tablename);
    return $this;
  }

  public function delete(string $tablename = null) {
    $this->set($tablename);
    return $this;
  }

  public function copy(string $tablename = null) {
    $this->set($tablename);
    return $this;
  }

  public function result(string $tablename = null) {
    return $this->result;
  }

  public function get(string $tablename = null) {
    return null;
  }

  public function set(string $tablename = null, $value = null) {
    if (!is_null($tablename))
      $this->tablename = $tablename;
    if (!is_null($value))
      $this->data = $value;
    return true;
  }
}
