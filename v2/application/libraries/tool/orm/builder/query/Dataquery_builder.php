<?php

/**
 * Datatable_builder aims to build dynamically class and properties related to tablename,
 * then store new class to libraries/tool/orm/database/tables/tablename_classname.php
 */

class Dataquery_builder extends Query_builder {

  public function __construct(string $tablename = null) {
    parent::__construct($tablename);
    //$this->queries = new Dataqueries_builder();
  }
}
