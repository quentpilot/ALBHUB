<?php

class usg_users_groups {

	public $usg_id = null;

	public $usg_name = null;

	public $usg_alias = null;

	public $usg_level = null;

	public $usg_sta_id = null;

	public function __construct($usg_id = null, $usg_name = null, $usg_alias = null, $usg_level = null, $usg_sta_id = null) {
		$this->usg_id = $usg_id;
		$this->usg_name = $usg_name;
		$this->usg_alias = $usg_alias;
		$this->usg_level = $usg_level;
		$this->usg_sta_id = $usg_sta_id;
	}
}