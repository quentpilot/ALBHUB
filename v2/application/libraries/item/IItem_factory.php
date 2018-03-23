<?php

require_once APPPATH . 'libraries/item/IItem.php';

interface IItem_factory extends IItem {
  public static function new_instance(string $item_type);
  public function build();
  public function load($type = null, $classname = null);
}
