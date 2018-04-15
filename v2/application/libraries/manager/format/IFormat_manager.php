<?php

interface IFormat_manager {
  public function format();

  public function get($property = null);

  public function set($property = null, $value = null);
}
