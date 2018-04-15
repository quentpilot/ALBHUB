<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_infos {
  public $usi_user_id = 0;
  public $usi_groups_id = null;
  public $usi_firstname = null;
  public $usi_lastname = null;
  public $usi_phone = null;
  public $usi_token = null;
  public $usi_invite_token = null;
  public $usi_profile_image = null;
  public $usi_background_image = null;
  public $usi_social_networks = null;
  public $usi_job = null;
  public $usi_work_hours = 0;

  public function __construct($user_id = 0, $groups_id = null, $firstname = null, $lastname = null, $phone = null, $token = null, $invite_token = null, $profile_image = null, $background_image = null, $social_networks = null, $job = null, $work_hours = 0) {
    $this->usi_user_id = $user_id;
    $this->usi_groups_id = $groups_id;
    $this->usi_firstname = $firstname;
    $this->usi_lastname = $lastname;
    $this->usi_phone = $phone;
    $this->usi_token = $token;
    $this->usi_invite_token = $invite_token;
    $this->usi_profile_image = $profile_image;
    $this->usi_background_image = $background_image;
    $this->usi_social_networks = $social_networks;
    $this->usi_job = $job;
    $this->usi_work_hours = $work_hours;
  }

  public function copy(object $obj = null) : bool {
    if (is_null($obj))
      return false;
    $this->usi_user_id = $obj->usi_user_id;
    $this->usi_groups_id = $obj->usi_groups_id;
    $this->usi_firstname = $obj->usi_firstname;
    $this->usi_lastname = $obj->usi_lastname;
    $this->usi_phone = $obj->usi_phone;
    $this->usi_token = $obj->usi_token;
    $this->usi_invite_token = $obj->usi_invite_token;
    $this->usi_profile_image = $obj->usi_profile_image;
    $this->usi_background_image = $obj->usi_background_image;
    $this->usi_social_networks = $obj->usi_social_networks;
    $this->usi_job = $obj->usi_job;
    $this->usi_work_hours = $obj->usi_work_hours;
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
