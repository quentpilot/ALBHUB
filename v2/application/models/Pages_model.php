<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends MY_Model {

  public function __construct() {
    parent::__construct();
  }

  public function get_page($slug = null) {
    $response = array(
      'title' => 'ALB Impression - Bienvenue',
      'title_services' => 'Nos Services'
    );
    return $this->result($response);
  }
}
