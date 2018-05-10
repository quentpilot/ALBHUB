<?php

class Datatable_database extends Table_database {

	public function __construct($tablename = null, $prefix = null, $primary_key = 'id') {
    parent::__construct($tablename, $prefix, $primary_key);
  }
}
