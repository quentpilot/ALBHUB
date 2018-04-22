<?php

/**
 * IORM_builder interface aims to help Orm child classes to build database tables data
 */

interface IORM_builder {

  public function build();

  //public function explode_tablename();

  public function get(string $property);

  public function set(string $property, $value);
}
