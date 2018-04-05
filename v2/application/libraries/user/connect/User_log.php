<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_log {
  protected $user = null;
  protected $infos = null;
  protected $status = 0;

  public function __construct(User_session $user = null, User_infos $infos = null, bool $is_loged = false) {
    $this->user = $user;
    $this->infos = $infos;
    $this->status = $is_loged;
  }

  public function is_loged() {
    if (!is_null($this->user))
      $this->status = $this->user->get('status_id');
    elseif (get_instance()->session->has_userdata('status_id')) {
      // TODO : build this user with session
      $this->status = get_instance()->session->userdata('status_id');
    } else
      return false;
    return $this->status;
  }

  public function set_session(User_session $user = null, User_infos $infos = null) {
    if (is_null($user))
      return false;
    $usr_user = array(
      'id' => $user->id,
      'username' => $user->username,
      'email' => $user->email,
      'valid_email' => $user->valid_email,
      'register_date' => $user->register_date,
      'last_log' => $user->last_log,
      'group_id' => $user->group_id,
      'status_id' => $user->status_id
    );

    get_instance()->session->set_userdata($usr_user);

    if (!is_null($infos)) {
      $usr_infos = array(
        'user_id' => $user->id,
        'groups_id' => $infos->groups_id,
        'firstname' => $infos->firstname,
        'lastname' => $infos->lastname,
        'phone' => $infos->phone,
        'token' => $infos->token,
        'invite_token' => $infos->invite_token,
        'profile_image' => $infos->profile_image,
        'background_image' => $infos->background_image,
        'social_networks' => $infos->social_networks,
        'job' => $infos->job,
        'work_hours' => $infos->work_hours
      );
      get_instance()->session->set_userdata($usr_infos);
    }
    $this->user = $user;
    $this->infos = $infos;
    $this->status = $user->status_id;
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
