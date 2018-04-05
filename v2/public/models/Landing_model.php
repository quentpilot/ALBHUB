<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_model extends MY_Model {

  public function __construct() {
    parent::__construct();
  }

  public function get_page($slug = null) {
    $params = array('load_result' => $slug);
    return $this->response(array('landing_model' => 'load_result'), $params);
  }

  public function load_result($slug = null) {
    return $this->result(array('title' => 'welcome '. $slug));
  }
}
