<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends MY_Admin_Model {

  public function __construct() {
    parent::__construct();
  }

  public function get_page($slug = null) {
    return $this->result(array('title' => 'welcome admin'));
  }
}
