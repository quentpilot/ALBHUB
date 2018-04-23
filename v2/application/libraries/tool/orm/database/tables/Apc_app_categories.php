<?php

class apc_app_categories {

	public $apc_id = null;

	public $apc_name = null;

	public $apc_alias = null;

	public $apc_sta_id = null;

	public function __construct($apc_id = null, $apc_name = null, $apc_alias = null, $apc_sta_id = null) {
		$this->apc_id = $apc_id;
		$this->apc_name = $apc_name;
		$this->apc_alias = $apc_alias;
		$this->apc_sta_id = $apc_sta_id;
	}
}