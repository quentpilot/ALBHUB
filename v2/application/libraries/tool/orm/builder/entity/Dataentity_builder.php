<?php

/**
 * Datatable_builder aims to build dynamically class and properties related to tablename,
 * then store new class to libraries/tool/orm/database/tables/tablename_classname.php
 */

class Dataentity_builder extends Entity_builder {

  public function __construct(string $tablename = null, string $classname = null, string $repository = null) {
    parent::__construct($tablename, $classname, $repository);
  }
}
