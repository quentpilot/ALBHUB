<?php

/**
 *
 */

class Datatable_query extends Table_query {

  public function __construct(string $tablename = null, $data = null) {
    parent::__construct($tablename, $data);
    $this->query_builder = new Dataquery_builder();
    $this->table_builder = new Datatable_builder();
    $this->result = new Datatable_result();
  }
}
