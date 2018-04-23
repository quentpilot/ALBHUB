<?php

/**
 * Datatable_builder aims to build dynamically class and properties related to tablename,
 * then store new class to libraries/tool/orm/database/tables/tablename_classname.php
 */

require_once APPPATH . 'libraries/tool/orm/builder/query/IQueries_builder.php';

class Queries_builder implements IQueries_builder {

  public $configs = null;

  protected $tablename = null;

  protected $query = null;

  protected $result = null;

  protected $ci_result = null;

  protected $ci = null;

  public function __construct(string $tablename = null) {
    $this->ci = &get_instance();
    $this->tablename = $tablename;
    $this->query = '';
    $this->result = array();
  }

  public function build(string $tablename = null) : bool {
    $tablename = is_null($tablename) ? $this->tablename : $tablename;
    $this->tablename = $tablename;
    return $this->process();
  }

  public function query() : bool {
    return false;
  }

  public function result() : array {
    if ($this->execute())
      return $this->ci_result;
    return $this->result;
  }

  public function process() : bool {
    return false;
  }

  public function format() : bool {
    // format result
    return false;
  }

  public function concat(string $text = null, $index = null, $value = null, $delim = ',') : bool {
    $callback = debug_backtrace()[1]['function'];
    $text = is_null($text) ? $callback . ' ' : $text;
    $index = is_null($index) ? strtoupper($callback) : $index;
    $this->result[$index] = is_null($value) ? trim($text) : $value;
    $value = is_null($value) ? '' : $value;
    $value = is_array($value) ? implode($delim, $value) : $value;
    $this->query .= $text . $value . ' ';
    return array_key_exists($index, $this->result);
  }

  public function execute() {
    if (!is_null($this->query) && count($this->result())) {
      $response = $this->ci->db->query($this->query)->row();
      if ($response) {
        $this->ci_result = $response;
        return true;
      }
    }
    return false;
  }

  public function select(array $rules = null) : IQueries_builder {
    $rules = is_null($rules) ? array() : $rules;
    $tables = $rules;
    $query = array();
    foreach ($tables as $key => $table) {
      $exp = explode('_', $table);
      $query[$key] = $table;
    }
    $rules = $query;
    $this->concat('SELECT ', null, $rules);
    return $this;
  }

  public function insert(array $rules = array()) : IQueries_builder {
    $this->concat(null, null, $rules);
    return $this;
  }
  public function update(array $rules = array()) : IQueries_builder {
    $this->concat(null, null, $rules);
    return $this;
  }
  public function delete(array $rules = array()) : IQueries_builder {
    $this->concat(null, null, $rules);
    return $this;
  }
  public function copy(array $rules = array()) : IQueries_builder {
    $this->concat(null, null, $rules);
    return $this;
  }
  public function drop(array $rules = array()) : IQueries_builder {
    $this->concat(null, null, $rules);
    return $this;
  }
  public function truncate(array $rules = array()) : IQueries_builder {
    $this->concat(null, null, $rules);
    return $this;
  }
  public function import(array $rules = array()) : IQueries_builder {
    $this->concat(null, null, $rules);
    return $this;
  }
  public function export(array $rules = array()) : IQueries_builder {
    $this->concat(null, null, $rules);
    return $this;
  }

  public function asc(array $rules = array()) : IQueries_builder {
    $this->concat(null, null, $rules);
    return $this;
  }
  public function count(array $rules = array()) : IQueries_builder {
    $this->concat(null, null, $rules);
    return $this;
  }
  public function desc(array $rules = array()) : IQueries_builder {
    $this->concat(null, null, $rules);
    return $this;
  }
  public function distinct(array $rules = array()) : IQueries_builder {
    $this->concat(null, null, $rules);
    return $this;
  }
  public function from(array $rules = array()) : IQueries_builder {
    $tables = $rules;
    $query = array();
    foreach ($tables as $key => $table) {
      $exp = explode('_', $table);
      $query[$key] = $table . ' AS ' . $exp[0];
    }
    $rules = $query;
    $this->concat('FROM ', null, $rules);
    return $this;
  }
  public function join(array $rules = array()) : IQueries_builder {
    $this->concat(null, null, $rules);
    return $this;
  }
  public function limit(array $rules = array()) : IQueries_builder {
    $this->concat(null, null, $rules);
    return $this;
  }
  public function order_by(array $rules = array()) : IQueries_builder {
    $this->concat('ORDER BY ', null, $rules);
    return $this;
  }
  public function rand(array $rules = array()) : IQueries_builder {
    $this->concat(null, null, $rules);
    return $this;
  }
  public function sub(array $rules = array()) : IQueries_builder {
    $this->concat(null, null, $rules);
    return $this;
  }
  public function sum(array $rules = array()) : IQueries_builder {
    $this->concat(null, null, $rules);
    return $this;
  }
  public function where(array $rules = array()) : IQueries_builder {
    $rules = implode(' = ', $rules);
    $rule = array_key_exists('WHERE', $this->result) ? 'AND ' : 'WHERE ';
    $index = ($rule == 'WHERE ') ? 'WHERE' : 'AND' ;
    $this->concat($rule, $index, $rules);
    return $this;
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
