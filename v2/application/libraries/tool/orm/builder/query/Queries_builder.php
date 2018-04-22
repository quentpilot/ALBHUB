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

  public function concat(string $text, $index = null, $value = null, $delim = ',') : bool {
    $callback = debug_backtrace()[1]['function'];
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

  public function insert(array $rules = null) : IQueries_builder {
    $this->concat('INSERT ', null, $rules);
    return $this;
  }
  public function update(array $rules = null) : IQueries_builder {
    $this->concat('UPDATE ', null, $rules);
    return $this;
  }
  public function delete(array $rules = null) : IQueries_builder {
    $this->concat('DELETE ', null, $rules);
    return $this;
  }
  public function copy(array $rules = null) : IQueries_builder {
    $this->concat('DUPLICATE ', null, $rules);
    return $this;
  }
  public function drop(array $rules = null) : IQueries_builder {
    $this->concat('DROP ', null, $rules);
    return $this;
  }
  public function truncate(array $rules = null) : IQueries_builder {
    $this->concat('TRUNCATE ', null, $rules);
    return $this;
  }
  public function import(array $rules = null) : IQueries_builder {
    $this->concat('IMPORT ', null, $rules);
    return $this;
  }
  public function export(array $rules = null) : IQueries_builder {
    $this->concat('EXPORT ', null, $rules);
    return $this;
  }

  public function asc(array $rules = null) : IQueries_builder {
    $this->concat('ASC ', null, $rules);
    return $this;
  }
  public function count(array $rules = null) : IQueries_builder {
    $this->concat('COUNT ', null, $rules);
    return $this;
  }
  public function desc(array $rules = null) : IQueries_builder {
    $this->concat('DESC ', null, $rules);
    return $this;
  }
  public function distinct(array $rules = null) : IQueries_builder {
    $this->concat('DISTINCT ', null, $rules);
    return $this;
  }
  public function from(array $rules = null) : IQueries_builder {
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
  public function join(array $rules = null) : IQueries_builder {
    $this->concat('JOIN ', null, $rules);
    return $this;
  }
  public function limit(array $rules = null) : IQueries_builder {
    $this->concat('LIMIT ', null, $rules);
    return $this;
  }
  public function order_by(array $rules = null) : IQueries_builder {
    $this->concat('ORDER BY ', null, $rules);
    return $this;
  }
  public function rand(array $rules = null) : IQueries_builder {
    $this->concat('RAND ', null, $rules);
    return $this;
  }
  public function sub(array $rules = null) : IQueries_builder {
    $this->concat('SUB ', null, $rules);
    return $this;
  }
  public function sum(array $rules = null) : IQueries_builder {
    $this->concat('SUM ', null, $rules);
    return $this;
  }
  public function where(array $rules = null) : IQueries_builder {
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
