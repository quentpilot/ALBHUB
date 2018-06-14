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
      $this->status = $this->user->get('sta_id');
    elseif (get_instance()->session->has_userdata('sta_id')) {
      // TODO : build this user with session
      $this->status = get_instance()->session->userdata('sta_id');
    } else
      return false;
    return $this->status;
  }

  public function set_session(User_session $user = null, User_infos $infos = null) {
    if (is_null($user))
      return false;
    $usr_user = array(
      'id' => $user->usr_id,
      'username' => $user->usr_username,
      'email' => $user->usr_email,
      'valid_email' => $user->usr_valid_email,
      'register_date' => $user->usr_register_date,
      'last_log' => $user->usr_last_log,
      'group_id' => $user->usr_group_id,
      'sta_id' => $user->usr_sta_id
    );

    get_instance()->session->set_userdata($usr_user);

    if (!is_null($infos)) {
      $usr_infos = array(
        'user_id' => $user->usr_id,
        'groups_id' => $infos->usi_groups_id,
        'firstname' => $infos->usi_firstname,
        'lastname' => $infos->usi_lastname,
        'phone' => $infos->usi_phone,
        'token' => $infos->usi_token,
        'invite_token' => $infos->usi_invite_token,
        'profile_image' => $infos->usi_profile_image,
        'background_image' => $infos->usi_background_image,
        'social_networks' => $infos->usi_social_networks,
        'job' => $infos->usi_job,
        'work_hours' => $infos->usi_work_hours
      );
      get_instance()->session->set_userdata($usr_infos);
    }
    $this->user = $user;
    $this->infos = $infos;
    $this->status = $user->usr_sta_id;
    return true;
  }

  public function update_user_logs(IORM_database $entity, string $action_type) {
    $ci = &get_instance();
    $date = date('Y-m-d H:i:s');
    $data = array(
      'usl_tb_id' => $entity->get($entity->get('tb_primary_key')),
      'usl_tb_name' => $entity->get('tb_name'),
      'usl_tb_primary_key' => $entity->get('tb_primary_key'),
      'usl_'.$action_type.'_by' => $ci->session->userdata('id'),
      'usl_'.$action_type.'_date' => $date,
      'usl_sta_id' => 1
    );

    if ($action_type == 'created') {
      $ci->db->insert('usl_users_logs', $data);
    } else {
      $ci->db->where('usl_tb_id', $data['usl_tb_id'])
             ->where('usl_tb_name', $data['usl_tb_name'])
             ->update('usl_users_logs', $data);
    }
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
