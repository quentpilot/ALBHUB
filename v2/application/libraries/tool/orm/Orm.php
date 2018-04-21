<?php

/**
 * Orm class aims to help Orm child classes to build database tables data
 */

require_once APPPATH . 'libraries/tool/orm/IORM.php';

class Orm implements IORM {

  public $it = 0;

  public $id = 0;

  public $alias = null;

  public $status = false;

  public $datatable = null;

  public $prefix = null;

  public $delim = null;

  protected $queries = null;

  protected $results = null;

  protected $query = null;

  protected $result = null;

  protected $table_builder = null;

  protected $errors = null;

  public function __construct(int $id = 0, string $datatable = null, $it = null, string $delim = '_') {
    $delim = is_null($delim) ? '_' : $delim;
    $this->delim = $delim;
    $this->it = (is_null($it) || !is_int($it)) ? ($this->it + 1) : $it;
    $this->id = $id;
    $this->datatable = $datatable;
    $this->prefix = is_null($datatable) ? null : explode($delim, $datatable)[0] . $delim;
    $this->table_builder = new Datatable_builder($datatable);
    $this->query = new Datatable_query($datatable);
    $this->result = new Datatable_result($this->query);
    $this->queries = array();
    $this->results = array();
  }

  public function query($query = null) {
    $query = is_null($query) ? $this->query : $query;
    if ($query instanceof IORM_query) {
      $this->query = $query;
      $this->query->tablename = $this->datatable;
      $this->prefix = is_null($this->datatable) ? null : explode($this->delim, $this->datatable)[0] . $this->delim;
      return $this->query;
    }
    return false;
  }

  public function result() {
    $response = $this->query->result();
    $this->result = $response;
    return $this->result;
  }

  public function refresh(array $tables = array()) {
    return $this->table_builder->refresh_datatables($tables);
  }

  public function iterate($id = null) {
    if (is_null($id)) {
      $this->it = $this->it + 1;
      return $this->it;
    }
    $it = (is_int($id) || is_numeric($id)) ? $this->it + $id : $id;
    $this->it = $it;
    return $it;
  }

  public function queries($id = null) {
    $id = is_null($id) ? $this->it : $id;
    if (is_array($this->queries) && count($this->queries)) {
      if (isset($this->queries[$id]))
        return $this->queries[$id];
    }
    return null;
  }

  public function results($id = null) {
    $id = is_null($id) ? $this->it : $id;
    if (is_array($this->results) && count($this->results)) {
      if (isset($this->results[$id]))
        return $this->results[$id];
    }
    return null;
  }

  public function new_datatable(string $datatable, bool $refresh = false) {
    if ($refresh && !$this->refresh()) return null;
    if ($this->table_builder->build($datatable))
      return $this->get_datatable();
    return null;
  }

  public function get_datatable() : object {
    return $this->table_builder->object;
  }

  public function set_datatable(string $datatable = null) {
    $datatable = is_null($datatable) ? $this->datatable : $datatable;
    if (is_null($datatable)) return false;
    return $this->new_datatable($datatable);
  }

  public function set_tablename(string $datatable = null, string $delim = '_') {
    $datatable = is_null($datatable) ? $this->datatable : $datatable;
    if (is_null($datatable) || is_null($delim)) return false;
    $exp = explode($delim, $datatable);
    $prefix = $exp[0] . $delim;
    $this->datatable = $datatable;
    $this->prefix = $prefix;
    $this->delim = $delim;
    return true;
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
