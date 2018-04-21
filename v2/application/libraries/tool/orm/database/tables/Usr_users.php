<?php

class Usr_users {

	public $usr_id = null;

	public $usr_username = null;

	public $usr_email = null;

	public $usr_password = null;

	public $usr_valid_email = null;

	public $usr_register_date = null;

	public $usr_last_log = null;

	public $usr_group_id = null;

	public $usr_status_id = null;

	public function __construct($usr_id = null, $usr_username = null, $usr_email = null, $usr_password = null, $usr_valid_email = null, $usr_register_date = null, $usr_last_log = null, $usr_group_id = null, $usr_status_id = null) {
		$this->usr_id = $usr_id;
		$this->usr_username = $usr_username;
		$this->usr_email = $usr_email;
		$this->usr_password = $usr_password;
		$this->usr_valid_email = $usr_valid_email;
		$this->usr_register_date = $usr_register_date;
		$this->usr_last_log = $usr_last_log;
		$this->usr_group_id = $usr_group_id;
		$this->usr_status_id = $usr_status_id;
	}
}