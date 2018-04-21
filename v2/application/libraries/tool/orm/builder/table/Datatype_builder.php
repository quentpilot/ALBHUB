<?php

/**
 * Datatable_builder aims to build dynamically class and properties related to tablename,
 * then store new class to libraries/tool/orm/database/tables/tablename_classname.php
 */

class Datatype_builder extends Table_builder {

  protected $types = null;

  protected $values = null; // default attr values

  public function __construct(string $tablename = null) {
    parent::__construct($tablename);
    $this->type = array();
  }

  public function process() : bool {
    $tablename = $this->tablename;
    $table = $this->ci->db->query("SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'$tablename'")->result();
    if (!$table)
      return false;
    $types = array();
    foreach ($table as $key => $value) {
      //print_r($value);
      $types[] = $value->DATA_TYPE;
    }
    $this->types = $types;
    return $this->format();
  }

  public function format() : bool {
    $format_types = array('int' => 'int', 'varchar' => 'string', 'text' => 'string', 'datetime' => 'string');
    $types = $this->types;
    $result = array();
    foreach ($types as $type) {
      //$result['name'] = $col;
      $result[] = (array_key_exists($type, $format_types)) ? $format_types[$type] : $type;
    }
    $this->result = $result;
    return true;
  }
}
