<?php

class Ust_users_settings {

	public $ust_id = null;

	public $ust_usr_id = null;

	public $ust_max_wrong_pass = null;

	public $ust_min_len_pass = null;

	public $ust_max_len_pass = null;

	public $ust_sta_id = null;

	public function __construct($ust_id = null, $ust_usr_id = null, $ust_max_wrong_pass = null, $ust_min_len_pass = null, $ust_max_len_pass = null, $ust_sta_id = null) {
		$this->ust_id = $ust_id;
		$this->ust_usr_id = $ust_usr_id;
		$this->ust_max_wrong_pass = $ust_max_wrong_pass;
		$this->ust_min_len_pass = $ust_min_len_pass;
		$this->ust_max_len_pass = $ust_max_len_pass;
		$this->ust_sta_id = $ust_sta_id;
	}
}