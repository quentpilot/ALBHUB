<?php

/**
 * Datatable_builder aims to build dynamically class and properties related to tablename,
 * then store new class to libraries/tool/orm/database/tables/tablename_classname.php
 */

class Dataqueries_builder extends Queries_builder {

  public function __construct(string $tablename = null) {
    parent::__construct($tablename);
  }
}
