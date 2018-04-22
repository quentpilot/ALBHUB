<?php

/**
 *
 */

require_once APPPATH . 'libraries/tool/orm/query/IORM_query.php';

class Table_query implements IORM_query {

  public $tablename = null;

  public $rules = null;

  public static $query_string = null;

  public $query_builder = null;

  public $table_builder = null;

  public $result = null;

  public function __construct(string $tablename = null, $rules = null, IQuery_builder $query_builder = null, IResult_ $result_builder = null, IDatatable_builder $table_builder = null) {
    $this->tablename = $tablename;
    $this->rules = $rules;
    $this->query_builder = new Query_builder();
    $this->table_builder = new Datatable_builder();
    $this->result = new Table_result();
  }

  public function build() {
    return false;
  }

  public function select($rules = null) {
    $this->set(null, $rules);
    // if rules, then concat a string representing several queries_builder methods to call
    // else, return a queries_builder select object
    return $this->query_builder->query()->select($rules);
  }

  public function insert($rules = null) {
    $this->set(null, $rules);
    return $this;
  }

  public function update($rules = null) {
    $this->set(null, $rules);
    return $this;
  }

  public function delete($rules = null) {
    $this->set(null, $rules);
    return $this;
  }

  public function copy($rules = null) {
    $this->set(null, $rules);
    return $this;
  }

  public function result($rules = null) {
    $this->result->build($this);
    $this->result->set('query', null);
    return $this->result;
  }

  public function get(string $tablename = null) {
    return null;
  }

  public function set(string $tablename = null, $value = null) {
    if (!is_null($tablename))
      $this->tablename = $tablename;
    if (!is_null($value))
      $this->rules = $value;
    return true;
  }
}
