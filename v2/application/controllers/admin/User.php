<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Admin_Controller {

	public function __construct() {
		parent::__construct();
		$this->view->set('folder', 'user');
	}

	public function index() {
		$data = array();
		$data = $this->user_model->get_user(0);
		if (!$data)
			$this->render('../errors/404', array('heading' => "Erreur 404 - page introuvable", 'message' => "La page que vous recherchez n'existe pas"));
		else
			$this->render('profile');
	}

	public function profile($user_id = 0) {
		$data = array();
		$data = $this->user_model->get_user($user_id);
		if (!$data)
			$this->render('../errors/404', array('heading' => "Erreur 404 - page introuvable", 'message' => "La page que vous recherchez n'existe pas<br> Aucun utilisateur trouvé"));
		else
			$this->render('profile', $data);
	}

	public function edit($user_id = null) {
		$this->render();
	}

	public function invite($user = null) {
		$this->render();
	}

	public function delete($user_id = null) {
		$this->render();
	}

	public function language($name = null) {
		$this->render();
	}

	public function signin($confirm = null) {
		$this->form_validation->set_rules('username', "<b>nom d'utilisateur</b>", 'trim|required|min_length[4]|max_length[100]|is_unique[usr_users.username]');
		$this->form_validation->set_rules('firstname', "<b>prénom</b>", 'trim|required');
		$this->form_validation->set_rules('lastname', "<b>nom de famille</b>", 'trim|required|max_length[100]');
		$this->form_validation->set_rules('email', "<b>adresse email</b>", 'trim|required|max_length[100]|valid_email|is_unique[usr_users.email]');
		$this->form_validation->set_rules('password', '<b>mot de passe</b>', 'trim|required|min_length[6]|max_length[100]');
		$this->form_validation->set_rules('confirm_password', '<b>Confirmation du mot de passe</b>', 'trim|required|min_length[6]|max_length[100]|matches[password]');
		$this->form_validation->set_rules('invite_token', "<b>code d'invitation</b>", 'trim|required|min_length[4]|max_length[100]');

		if (!$this->form_validation->run())
			$this->render('signin');
		else {
			$user = $this->user_model->signin_user();
			if ($user instanceof User_session && is_null($this->user_model->get('error'))) {
				$this->user_log->set_session($this->user_session, $this->user_infos);
				$this->session->set_flashdata('alert_message', "<center>Inscription créée avec succès !<br> Merci de bien vouloir valider votre compte depuis l'email envoyé à ".$this->user_session->email.".</center>");
				redirect('admin/user/signin-valid-email');
			} elseif (!is_null($this->user_model->get('error'))) {
				$error = implode(' : ', $this->user_model->get('error'));
				$this->session->set_flashdata('alert_message', "Une erreur est survenue lors de votre inscription.<pre>".$error."</pre><br> Veuillez réessayer");
				$this->render('signin');
			}
			//debug($this->input->post());
		}
	}

	public function signin_valid_email() {
		$this->render('signin-valid-email');
	}

	public function signout($type = null) {
		$this->render('signout');
	}

	public function login() {
		$this->form_validation->set_rules('username', "<b>Nom d'utilisateur</b>", 'trim|required|min_length[4]|max_length[100]');
		$this->form_validation->set_rules('password', '<b>Mot de passe</b>', 'trim|required|min_length[6]|max_length[100]');

		if (!$this->form_validation->run())
			$this->render('login');
		else {
			$user = $this->user_model->log_user();
			//print_r($user);
			if ($user->get('usr_status_id')) {
				if ($this->user_log->set_session($user, $this->user_infos)) {
					$this->session->set_flashdata('alert_message', "Bonjour <b> ".$this->user_infos->usi_firstname."</b> !");
					redirect('admin/dashboard');
				}
			}
			$this->session->set_flashdata('alert_message', "Le nom d'utilisateur<b> ".$this->input->post('username')."</b> n'existe pas ou le mot de passe est incorrecte.");
			$this->render('login');
		}
	}

	public function logout() {
		$this->db->set_dbprefix();
		$this->user_model->logout_user();
		redirect('admin');
	}

	public function forget_password() {
		$this->render('forget-password');
	}

	public function new_password($endpoint = null) {
		$this->render('new-password');
	}
}
