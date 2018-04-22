<?php

/**
 *
 */

class Datatable_query extends Table_query {

  public function __construct(string $tablename = null, $rules = null) {
    parent::__construct($tablename, $rules);
    $this->query_builder = new Dataquery_builder();
    $this->result = new Datatable_result();
  }
}
