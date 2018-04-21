<?php

/**
 *
 */

class Datatable_result extends Table_result {

  public $result = null;

  public function __construct(IORM_query $query = null) {
    parent::__construct($query);
    $this->query = $query;
  }
}
