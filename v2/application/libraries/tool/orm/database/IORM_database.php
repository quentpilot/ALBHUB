<?php

interface IORM_database {

  public function ci();

  public function hydrate(object $data);

  public function hydrate_all(array $data, array $tb_ids, array $db_table_list = array(), bool $r_all = false);

  public function array_to_object(array $data);

  public function dump($data);

  public function builder();

  public function query();

  public function find();

  public function find_all();

  public function join();

  public function select();

  public function save();

  public function insert();

  public function update();

  public function delete();

  public function duplicate();

  public function list();

  public function archive();

  public function restore();

  public function updater();

  public function logs();

  public function cache();

  public function add_tb_id();

  public function get_name_from_id();

  public function get_id_from_name();

  public function list_fields();

  public function list_values();

  public function row();

  public function add();

  public function set_tb();

  public function unset_tb();

  public function unset();

  public function get(string $property);

  public function set(string $property, $value = null);
}
