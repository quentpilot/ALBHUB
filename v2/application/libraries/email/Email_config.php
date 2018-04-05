<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_config {
  public $from = null;
  public $to = null;
  public $cc = null;
  public $bcc = null;
  public $type = null;
  public $subject = null;
  public $message = null;
  public $hello_name = null;
  public $site_name = null;
  public $site_url = 0;
  public $button_url = null;
  public $signature = 0;

  public function __construct(string $from = null, string $to = null, string $cc = null, string $bcc = null, string $type = 'text', string $subject = null, string $message = null, string $hello_name = null, string $site_name = null, string $site_url = null, string $button_url = null, string $signature = null) {
    $this->from = $from;
    $this->to = $to;
    $this->cc = $cc;
    $this->bcc = $bcc;
    $this->type = $type;
    $this->subject = $subject;
    $this->message = $message;
    $this->hello_name = $hello_name;
    $this->site_name = $site_name;
    $this->site_url = $site_url;
    $this->button_url = $button_url;
    $this->signature = $signature;
  }

  public function copy(object $obj = null) : bool {
    if (is_null($obj))
      return false;
    $this->from = $obj->from;
    $this->to = $obj->to;
    $this->cc = $obj->cc;
    $this->bcc = $obj->bcc;
    $this->type = $obj->type;
    $this->subject = $obj->subject;
    $this->message = $obj->message;
    $this->hello_name = $obj->hello_name;
    $this->site_name = $obj->site_name;
    $this->site_url = $obj->site_url;
    $this->button_url = $obj->button_url;
    $this->signature = $obj->signature;
    return true;
  }

  public function add(array $obj = array()) : bool {
    if (!is_array($obj) || !count($obj))
      return false;
    /*$this->id = $obj->id;
    $this->username = $obj->username;
    $this->email = $obj->email;
    $this->password = $obj->password;
    $this->valid_email = $obj->valid_email;
    $this->register_date = $obj->register_date;
    $this->last_log = $obj->last_log;
    $this->group_id = $obj->group_id;
    $this->status_id = $obj->status_id;*/
    return true;
  }

  /**
  * get method would to return class attribute value entered as param
  */
  public function get($property = null) {
    if (is_null($property))
      return false;
    if (property_exists($this, $property))
      return $this->$property;
  }

  /**
  * set method would to set attribute choosen with wanted value
  */
  public function set($property = null, $value = null) {
    if (is_null($property))
      return false;
    if (property_exists($this, $property)) {
      $this->$property = $value;
      return $value;
    }
    return null;
  }
}
