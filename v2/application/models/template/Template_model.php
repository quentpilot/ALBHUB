<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template_model extends MY_Model {

  public function __construct() {
    parent::__construct();
  }

  public function get_css() {
    $response = new Res();
    return $response;
  }
}
