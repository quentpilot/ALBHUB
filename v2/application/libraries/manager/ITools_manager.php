<?php

interface ITools_manager {
  public function set_configs();
  public function load_result();
  public function load_views(array $views = array());
  public function get(string $property = null);
  public function set(string $property = null, $value = null);
}
