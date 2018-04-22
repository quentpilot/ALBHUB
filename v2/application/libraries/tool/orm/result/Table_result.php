<?php

/**
 *
 */

require_once APPPATH . 'libraries/tool/orm/result/IORM_result.php';

class Table_result implements IORM_result {

  public $tablename = null;

  public $query = null;

  public $result = null;

  public function __construct(IORM_query $query = null) {
    $this->query = $query;
  }

  public function build(IORM_query $query = null) {
    $this->query = $query;
    $this->tablename = is_null($query) ? $this->tablename : $query->tablename;
    return $this->result();
  }

  public function result() {
    return $this->result;
  }

  public function object() {
    return $this->result;
  }

  public function array() {
    return $this->result;
  }

  public function count() {
    return count($this->result);
  }

  public function row($key) {
    if (array_key_exists($key, $this->result))
      return $this->result[$key];
    return null;
  }

  public function get(string $tablename = null) {
    return null;
  }

  public function set(string $tablename = null, $value = null) {
    return null;
  }
}
