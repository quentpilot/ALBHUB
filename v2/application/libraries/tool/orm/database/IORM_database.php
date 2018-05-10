<?php

interface IORM_database {

  public function hydrate(object $data);

  public function array_to_object(array $data);

  public function dump($data);

  public function query();

  public function find();

  public function join();

  public function select();

  public function insert();

  public function update();

  public function delete();

  public function duplicate();

  public function get(string $property);

  public function set(string $property, $value = null);
}
