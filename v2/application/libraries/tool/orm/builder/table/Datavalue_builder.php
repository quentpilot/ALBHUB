<?php

/**
 * Datatable_builder aims to build dynamically class and properties related to tablename,
 * then store new class to libraries/tool/orm/database/tables/tablename_classname.php
 */

class Datavalue_builder extends Table_builder {

  protected $values = null; // default attr values

  public function __construct(string $tablename = null) {
    parent::__construct($tablename);
    $this->values = array();
  }

  public function process() : bool {
    $tablename = $this->tablename;
    $table = $this->ci->db->query("SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'$tablename'")->result();
    if (!$table)
      return false;
    $values = array();
    foreach ($table as $key => $value) {
      $values[] = array(
        'default' => $value->COLUMN_DEFAULT,
        'type' => $value->DATA_TYPE
      );
    }
    $this->values = $values;
    return $this->format();
  }

  public function format() : bool {
    $format_values = array(
      'int' => 0,
      'varchar' => 'null',
      'text' => 'null',
      'timestamp' => 'null',
      'datetime' => 'null',
      'date' => 'null',
      'time' => 'null'
    );
    $values = $this->values;
    $result = array();
    foreach ($values as $value) {
      //$result[] = $value['default'];
      $result[] = (array_key_exists($value['type'], $format_values)) ? $format_values[$value['type']] : $value['default'];
    }
    $this->result = $result;
    return true;
  }
}
