<?php

interface ISetting_manager {

  public function add(string $key, $item = null);

  public function remove(string $key);

  public function get_item(string $key = null);

  public function set_items(array $items);

  public function set_views(array $views = array());
}
