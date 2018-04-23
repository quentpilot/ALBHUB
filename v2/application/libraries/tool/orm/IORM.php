<?php

/**
 * IORM interface aims to help Orm child classes to build database tables data
 */

interface IORM {

  public function query($query = null);

  public function result($query = null);

  public function entity();

  public function refresh(array $tables = array(), bool $return = false);

  public function iterate();

  public function queries();

  public function results();

  public function new_datatable(string $datatable, bool $refresh = false);

  public function get_datatable();

  public function set_datatable(string $datatable = null);

  public function get_tablename(bool $build = true);

  public function set_tablename(string $tablename = null, string $delim = '_');

  public function get(string $property);

  public function set(string $property, $value);
}
