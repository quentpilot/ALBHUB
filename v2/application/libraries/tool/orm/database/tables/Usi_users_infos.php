<?php

class Usi_users_infos {

	public $usi_user_id = null;

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

	public $usi_work_hours = null;

	public function __construct($usi_user_id = null, $usi_groups_id = null, $usi_firstname = null, $usi_lastname = null, $usi_phone = null, $usi_token = null, $usi_invite_token = null, $usi_profile_image = null, $usi_background_image = null, $usi_social_networks = null, $usi_job = null, $usi_work_hours = null) {
		$this->usi_user_id = $usi_user_id;
		$this->usi_groups_id = $usi_groups_id;
		$this->usi_firstname = $usi_firstname;
		$this->usi_lastname = $usi_lastname;
		$this->usi_phone = $usi_phone;
		$this->usi_token = $usi_token;
		$this->usi_invite_token = $usi_invite_token;
		$this->usi_profile_image = $usi_profile_image;
		$this->usi_background_image = $usi_background_image;
		$this->usi_social_networks = $usi_social_networks;
		$this->usi_job = $usi_job;
		$this->usi_work_hours = $usi_work_hours;
	}
}