<?php

interface ITools_manager {
  public function load_result();
  public function get($property = null);
  public function set($property = null, $value = null);
}
