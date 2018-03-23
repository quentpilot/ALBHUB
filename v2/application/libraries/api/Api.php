<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api {

  protected $header = null;

  protected $key = null;

  protected $data = null;

  public function __construct($data = array(), $key = null, $header = null) {
    $this->data = is_array($data) ? $data : array();
    $this->key = $key;
    $this->header = $header;
  }

  public function check() : bool {
    return false;
  }

  protected function check_header() : bool {
    return isset($this->header);
  }

  protected function check_key() : bool {
    return (!is_null($this->key));
  }

  public function return_asterisk($data = null, $return = false) {
    if (is_null($data))
      $data = (array)$this->data;
    $str = implode(',', $data);
    if ($return)
      return $str;
    echo $str;
    return true;
  }

  public function return_json($data = null, $return = false) {
    header("Content-Type: application/json");
    if (is_null($data))
      $data = $this->data;
    $json = json_encode($data);
    if ($return)
      return $json;
    echo $json;
    return true;
  }
}
