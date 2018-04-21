<?php

/**
 * IORM_builder interface aims to help Orm child classes to build database tables data
 */

interface IORM_query {

  public function build();

  public function select();

  public function insert();

  public function update();

  public function delete();

  public function copy();

  public function result();

  public function get(string $tablename = null);

  public function set(string $tablename = null, $data = null);
}
