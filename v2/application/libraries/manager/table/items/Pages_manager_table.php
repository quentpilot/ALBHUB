<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_manager_table extends Items_manager_table {

  public function __construct(Items_manager_setting $configs = null) {
    parent::__construct($configs);
  }
}
