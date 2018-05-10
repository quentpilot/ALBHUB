<?php

/**
 * IORM_entity interface aims to help Orm child classes to build database tables data
 */

interface IORM_entity {

  public function build();

  public function process();

  public function factory();

  public function find();

  public function copy();

  public function result();

  public function hydrate();

  public function feed();

  public function fill();

  public function get(string $property);

  public function set(string $property, $value = null);
}
