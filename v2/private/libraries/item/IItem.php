<?php

interface IItem {
  public function feed(array $attributes);
  public function copy(Item $object);
  public function get($attribute);
  public function set($attribute, $value = null);
}
