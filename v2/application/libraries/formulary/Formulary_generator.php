<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formulary_generator {

  public $configs = null;

  public $fields = null;

  public $template = null;

  public $output = null;

  public function __construct() {
    $ci = &get_instance();
    $this->template = null;
    $this->fields = null;
  }

  public function generate($fields = null) {
    $this->fields = is_null($fields) ? $this->fields : $fields;
    return $this;
  }
}
