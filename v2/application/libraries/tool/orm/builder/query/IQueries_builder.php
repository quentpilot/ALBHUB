<?php

/**
 *
 */

interface IQueries_builder {

  public function query();

  public function result();

  public function process();

  public function format();

  public function concat(string $text, $index = null, $value = null, $delim = ',');

  public function execute();


  public function select();

  public function insert();

  public function update();

  public function delete();

  public function copy();

  public function drop();

  public function truncate();

  public function import();

  public function export();


  public function asc();

  public function count();

  public function desc();

  public function distinct();

  public function from();

  public function join();

  public function limit();

  public function order_by();

  public function rand();

  public function sub();

  public function sum();

  public function where();
}
