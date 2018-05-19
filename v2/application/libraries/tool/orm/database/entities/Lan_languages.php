<?php

class Lan_languages extends Datatable_database {

	public $lan_id = 0;

	public $lan_name = null;

	public $lan_alias = null;

	public $lan_code = null;

	public $lan_sta_id = 0;

	public function __construct(int $lan_id = 0, string $lan_name = null, string $lan_alias = null, string $lan_code = null, int $lan_sta_id = 0) {
		$this->lan_id = $lan_id;
		$this->lan_name = $lan_name;
		$this->lan_alias = $lan_alias;
		$this->lan_code = $lan_code;
		$this->lan_sta_id = $lan_sta_id;
	}
}