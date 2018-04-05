<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {

  protected $username = 'coucou';

  public function __construct() {
    parent::__construct();
  }

  public function get_user($slug = null) {
    $response = array();
    $where_row = (is_numeric($slug))
                  ? 'id'
                  : 'username';
    $response = $this->db->select()
                      ->from('usr_users')
                      ->join('usr_advanced_infos', 'usr_advanced_infos.user_id = usr_users.id')
                      ->where($where_row, $slug)
                      ->get()
                      ->result_array();
    if (count($response) == 1)
      $response = $response[0];
    return $this->result($response);
  }
}
