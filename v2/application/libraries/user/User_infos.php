<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_infos {
  public $user_id = 0;
  public $groups_id = null;
  public $firstname = null;
  public $lastname = null;
  public $phone = null;
  public $token = null;
  public $invite_token = null;
  public $profile_image = null;
  public $background_image = null;
  public $social_networks = null;
  public $job = null;
  public $work_hours = 0;

  public function __construct($user_id = 0, $groups_id = null, $firstname = null, $lastname = null, $phone = null, $token = null, $invite_token = null, $profile_image = null, $background_image = null, $social_networks = null, $job = null, $work_hours = 0) {
    $this->user_id = $user_id;
    $this->groups_id = $groups_id;
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->phone = $phone;
    $this->token = $token;
    $this->invite_token = $invite_token;
    $this->profile_image = $profile_image;
    $this->background_image = $background_image;
    $this->social_networks = $social_networks;
    $this->job = $job;
    $this->work_hours = $work_hours;
  }

  public function copy(object $obj = null) : bool {
    if (is_null($obj))
      return false;
    $this->user_id = $obj->user_id;
    $this->groups_id = $obj->groups_id;
    $this->firstname = $obj->firstname;
    $this->lastname = $obj->lastname;
    $this->phone = $obj->phone;
    $this->token = $obj->token;
    $this->invite_token = $obj->invite_token;
    $this->profile_image = $obj->profile_image;
    $this->background_image = $obj->background_image;
    $this->social_networks = $obj->social_networks;
    $this->job = $obj->job;
    $this->work_hours = $obj->work_hours;
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
