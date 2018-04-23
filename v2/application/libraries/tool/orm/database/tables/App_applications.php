<?php

class app_applications {

	public $app_id = null;

	public $app_name = null;

	public $app_alias = null;

	public $app_apc_id = null;

	public $app_sta_id = null;

	public function __construct($app_id = null, $app_name = null, $app_alias = null, $app_apc_id = null, $app_sta_id = null) {
		$this->app_id = $app_id;
		$this->app_name = $app_name;
		$this->app_alias = $app_alias;
		$this->app_apc_id = $app_apc_id;
		$this->app_sta_id = $app_sta_id;
	}
}