<?php

class uss_users_status {

	public $uss_id = null;

	public $uss_name = null;

	public $uss_alias = null;

	public $uss_table_name = null;

	public $uss_status = null;

	public function __construct($uss_id = null, $uss_name = null, $uss_alias = null, $uss_table_name = null, $uss_status = null) {
		$this->uss_id = $uss_id;
		$this->uss_name = $uss_name;
		$this->uss_alias = $uss_alias;
		$this->uss_table_name = $uss_table_name;
		$this->uss_status = $uss_status;
	}
}