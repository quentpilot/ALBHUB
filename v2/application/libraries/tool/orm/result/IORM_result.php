<?php

/**
 * IORM_builder interface aims to help Orm child classes to build database tables data
 */

interface IORM_result {

  public function build();

  public function result();

  public function object();

  public function array();

  public function string();

  public function json();

  public function rand();

  public function count();

  public function row($key);

  public function obj_to_tab(object $obj);

  public function tab_to_obj(array $tab);

  public function get(string $tablename = null);

  public function set(string $tablename = null, $data = null);
}
