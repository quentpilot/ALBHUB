<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends MY_Model {

  public function __construct() {
    parent::__construct();
  }

  public function get_page($slug = null) {
    return array('title' => 'index');
  }
}
