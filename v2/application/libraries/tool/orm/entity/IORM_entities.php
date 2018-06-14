<?php

/**
 * IORM_entities interface aims to manage several IORM_entity objects to map them and
 */

interface IORM_entities {

  public function build();

  public function process();

  public function add();

  public function query();

  public function result();

  public function get();

  public function set();
}
