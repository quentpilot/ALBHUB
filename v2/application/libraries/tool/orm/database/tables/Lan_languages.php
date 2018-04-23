<?php

class lan_languages {

	public $lan_id = null;

	public $lan_name = null;

	public $lan_alias = null;

	public $lan_code = null;

	public $lan_sta_id = null;

	public function __construct($lan_id = null, $lan_name = null, $lan_alias = null, $lan_code = null, $lan_sta_id = null) {
		$this->lan_id = $lan_id;
		$this->lan_name = $lan_name;
		$this->lan_alias = $lan_alias;
		$this->lan_code = $lan_code;
		$this->lan_sta_id = $lan_sta_id;
	}
}