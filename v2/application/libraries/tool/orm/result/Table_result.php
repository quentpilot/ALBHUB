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
    $this->result = is_array($result) ? $this->tab_to_obj($this->result) : $this->result;
    return $this->result;
  }

  public function array() {
    $this->result = is_array($this->result) ? $this->result : $this->obj_to_tab($this->result);
    return $this->result;
  }

  public function string() {
    return $this->result->to_string();
  }

  public function json() {
    return json_encode($this->result);
  }

  public function rand() {
    return $this->result;
  }

  public function count() {
    $counter = is_object($this->result) ? count($this->obj_to_tab($this->result)) : count($this->result);
    $counter = (($counter == 0) && is_array($this->result)) ? count(array_keys($this->result)) : $counter;
    return $counter;
  }

  public function row($key) {
    $result = is_array($this->result) ? $this->result : $this->obj_to_tab($this->result);
    if (array_key_exists($key, $this->result))
      return $this->result[$key];
    return null;
  }

  public function obj_to_tab(object $obj) : array {
    return array();
  }

  public function tab_to_obj(array $tab) : object {
    return new Object();
  }

  public function get(string $tablename = null) {
    return null;
  }

  public function set(string $tablename = null, $value = null) {
    return null;
  }
}
