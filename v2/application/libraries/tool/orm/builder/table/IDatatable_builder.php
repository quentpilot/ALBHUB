<?php

/**
 * IORM_builder interface aims to help Orm child classes to build database tables data
 */

require_once APPPATH . 'libraries/tool/orm/builder/IORM_builder.php';

interface IDatatable_builder extends IORM_builder {

  public function table_exists(string $tablename);
  public function refresh_datatables(array $tables = array());
}
