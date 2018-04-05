<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {

  protected $user = null;

  public function __construct() {
    parent::__construct();
  }

  public function create($type = 'post') : bool {
    $builder_method = 'create_';
    $method = $builder_method.$type;
    if (method_exists($this, $method))
      return $this->$method();
    return false;
  }

  protected function create_post() : bool {
    $user = new User_session(
      0,
      $this->input->post('username'),
      $this->input->post('email'),
      password_hash($this->input->post('password'), PASSWORD_BCRYPT),
      0,
      "NOW()",
      "NOW()",
      4,
      0
    );

    $about = new User_infos(
      0,
      null,
      $this->input->post('firstname'),
      $this->input->post('lastname'),
      null,
      create_token(32), // user_crypt lib
      $this->input->post('invite_token'),
      'anonymous_profile_image',
      'anonymous_anonymous_image',
      null,
      null,
      0
    );

    $this->user_session->copy($user);
    $this->user_infos->copy($about);
    return true;
  }

  public function signin_user() : User_session {
    if (!$this->is_valid_signin()) {
      $this->error = array('type' => 'valid_signin', 'message' => 'Validation du formulaire');
      return $this->user_session;
    }
    if (!$this->create('post')) {
      $this->error = array('type' => 'create_user', 'message' => "Création de l'utilisateur");
      return $this->user_session;
    }
    /*if (!$this->db->insert('usr_users', $this->user_session)) {
      $this->error = array('type' => 'insert_user', 'message' => "Enregistrement de l'utilisateur");
      return $this->user_session;
    }
    $this->user_infos->user_id = $this->db->insert_id();
    if (!$this->db->insert('usr_advanced_infos', $this->user_infos)) {
      $this->error = array('type' => 'insert_infos', 'message' => "Enregistrement avancé de l'utilisateur");
      return $this->user_session;
    }*/
    if (!$this->send_confirm_email('signin')) {
      $this->error = array('type' => 'send_email', 'message' => "Envoi de l'email de confirmation");
      return $this->user_session;
    }
    //$req = $this->db->select()->from('usr_users')->where('username', $username)->or_where('email', $username)->limit(1)->get();
    //if (count($req->result()) && $password === $req->result()[0]->password && $req->result()[0]->valid_email == 1) {
    return $this->user_session;
  }

  protected function is_valid_signin() {
    if (is_null($this->input->post('submit')))
      return false;
    if (!$this->is_valid_invite_token())
      return false;
    return true;
  }

  protected function send_confirm_email(string $type, string $from = null, string $to = null, $subject = null, $message = null, string $cc = null, string $bcc = null) : bool {
    $method = 'send_confirm_email_'.$type;
    $c_infos = $this->get_contact_infos();
    $from = is_null($from) ? $c_infos->contact_email : $from;
    $to = is_null($to) ? $this->user_session->email : $to;
    $hello_name = $this->user_infos->firstname;
    $site_name = $c_infos->site_name;
    $site_url = $c_infos->site_url;
    $text_type = 'text';
    $config = new Email_config($from, $to, $cc, $bcc, $text_type, $subject, $message, $hello_name, $site_name, $site_url);
    $this->email_config->copy($config);

    /*$econfig['protocol'] = 'smtp';
    $econfig['smtp_host']    = 'ssl://smtp.gmail.com';
    $econfig['smtp_port']    = '465';
    $econfig['smtp_timeout'] = '7';
    $econfig['smtp_user']    = 'quent.ktm@gmail.com';
    $econfig['smtp_pass']    = 'quent1pilot';
    $econfig['charset']    = 'utf-8';
    $econfig['newline']    = "\r\n";
    $econfig['mailtype'] = 'text'; // or html
    $econfig['validation'] = TRUE; // bool whether to validate email or not
    $this->email->initialize($econfig);*/

    if (method_exists($this, $method))
      return $this->$method($this->email_config);
    return false;
  }

  protected function send_confirm_email_signin(Email_config $config) : bool {
    $token = $this->user_infos->token; // to continue
    $subject = (is_null($config->subject)) ? "Confirmation de votre compte Administrateur" : $config->subject;
    $config->subject = $subject;
    if (!is_null($config->message)) {
      $message = $config->message;
    } else {
      $message = "Bonjour " . $config->hello_name . "\n\r";
      $message .= "Vous recevez cet email car nous avons le plaisir de vous demander confirmation\r\n";
      $message .= "de votre adresse email afin de valider votre compte auprès du site ALB impression.\r\n\r\n";
      $message .= "Pour se faire, veuillez cliquer sur le lien ci-dessous :\r\n\r\n";
      $message .= site_url()."/admin/user/confirm-email-token/" . $token . "\r\n\r\n\r\n";
      $message .= "En vous remerciant,\r\n";
      $message .= "L'équipe " . $config->site_name;
    }
    $config->message = $message;
    $this->email_config->copy($config);
    $this->email->from($config->from, $config->hello_name);
    $this->email->to($config->to);
    $this->email->subject($config->subject);
    $this->email->message($config->message);
    //print_r($this->email);
    //$status = $this->email->send();
    //echo $this->email->print_debugger();
    $header = "From: " . $config->from . "\r\n";
    $status = mail($config->to, $config->subject, $config->message, $header);
    return $status;
  }

  public function signout_user() : bool {
    return false;
  }

  public function new_pass() : User_session {
    return $this->user_session;
  }

  public function send_invite() : bool {
    return false;
  }

  public function send_forget_user_pass() {
    return false;
  }

  public function log_user() : User_session {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $req = $this->db->select()->from('usr_users')->where('username', $username)->or_where('email', $username)->limit(1)->get();

    if (count($req->result()) && $password === $req->result()[0]->password && $req->result()[0]->valid_email == 1) {
      // set main user data
      $this->user_session->copy($req->result()[0]);
      $this->user_session->set('status_id', 1);
      $this->user = $this->user_session;
      $this->db->where('id', $this->user_session->id)
               ->update('usr_users', $this->user_session);
      // get and set advanced user data
      $req = $this->db->select()->from('usr_advanced_infos')->where('user_id', $this->user_session->id)->get();
      $this->user_infos->copy($req->result()[0]);
    } else {
      $this->user_session->status_id = 0;
    }
    return $this->user_session;
  }

  public function logout_user() : bool {
    $this->db->set('status_id', 0)
             ->where('id', $this->session->userdata('id'))
             ->update('usr_users');
    $this->session->userdata = array();
    return true;
  }

  public function get_user($slug = null) : array {
    $response = false;
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

  protected function get_contact_infos() {
    $req = $this->db->select()->from('albi_settings')->where('status_id', 1)->order_by('id')->limit(1)->get()->result()[0];
    if (isset($req) && !is_null($req)) {
      $infos = $req;
      return (is_null($infos)) ? null : $infos;
    }
    return null;
  }

  protected function get_contact_email() {
    $req = $this->db->select('contact_email')->from('albi_settings')->where('status_id', 1)->order_by('id')->limit(1)->get()->result()[0];
    if (isset($req) && !is_null($req)) {
      $email = $req->contact_email;
      return (is_null($email)) ? null : $email;
    }
    return null;
  }

  protected function get_site_name() {
    $req = $this->db->select('site_name')->from('albi_settings')->where('status_id', 1)->order_by('id')->limit(1);
    if (count($req->result())) {
      $email = $req->result()[0]->site_name;
      return (is_null($email)) ? null : $email;
    }
    return null;
  }

  protected function get_site_url() {
    $req = $this->db->select('site_url')->from('albi_settings')->where('status_id', 1)->order_by('id')->limit(1);
    if (count($req->result())) {
      $email = $req->result()[0]->site_url;
      return (is_null($email)) ? null : $email;
    }
    return null;
  }

  protected function is_valid_email() : bool {
    return false;
  }

  protected function is_valid_token() : bool {
    return false;
  }

  protected function is_valid_invite_token() : bool {
    $token = $this->input->post('invite_token');
    $req = $this->db->select('invite_token')->from('usr_advanced_infos')->where('invite_token', $token)->get();
    if (!count($req->result_array()))
      return false;
    return true;
  }
}
