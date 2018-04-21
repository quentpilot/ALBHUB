<?php

/**
 * Datatable_builder aims to build dynamically class and properties related to tablename,
 * then store new class to libraries/tool/orm/database/tables/tablename_classname.php
 */

class Datalayout_builder extends Layout_builder {

  public function __construct(string $tablename = null, $configs = null) {
    parent::__construct($tablename, $configs);
  }
}
