<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends Item_model {

  public function __construct($cat_alias = 'menu', $query = null, $datatable = 'albi_items') {
    parent::__construct($cat_alias, $query, $datatable);
  }
}
