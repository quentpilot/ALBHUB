<?php

/**
 * Datatable_builder aims to build dynamically class and properties related to tablename,
 * then store new class to libraries/tool/orm/database/tables/tablename_classname.php
 */

class Datacolumn_builder extends Table_builder {

  protected $cols = null;

  protected $types = null;

  public function __construct(string $tablename = null) {
    parent::__construct($tablename);
    $this->cols = array();
    $this->types = new Datatype_builder($tablename);
  }

  public function process() : bool {
    $tablename = $this->tablename;
    $table = $this->ci->db->query("SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'$tablename'")->result();
    if (!$table)
      return false;
    $cols = array();
    foreach ($table as $key => $value) {
      $cols[] = $value->COLUMN_NAME;
    }
    $this->cols = $cols;
    if($this->types->build($tablename))
      return $this->format();
    return false;
  }

  public function format() : bool {
    $cols = $this->cols;
    $types = $this->types->result();
    $result = array();
    $it = 0;
    foreach ($cols as $col) {
      $result[] = $col;
      //$result[]['type'] = $types[$it];
      //$result[] = $col;
      $it++;
    }
    $this->result = $result;
    return true;
  }

  public function col_exists(string $name) {
    return array_key_exists($name, $this->cols);
  }

  protected function add_cols(string $name, $type = null) {
    return false;
  }

  protected function get_cols() {
    return $this->cols;
  }
}
