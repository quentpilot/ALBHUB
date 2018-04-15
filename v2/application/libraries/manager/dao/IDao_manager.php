<?php

interface IDao_manager {

  public function build();

  public function get($property = null);

  public function set($property = null, $value = null);
}
