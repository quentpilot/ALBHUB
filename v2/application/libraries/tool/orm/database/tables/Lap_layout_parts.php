<?php

class lap_layout_parts {

	public $lap_id = null;

	public $lap_name = null;

	public $lap_alias = null;

	public $lap_sta_id = null;

	public function __construct($lap_id = null, $lap_name = null, $lap_alias = null, $lap_sta_id = null) {
		$this->lap_id = $lap_id;
		$this->lap_name = $lap_name;
		$this->lap_alias = $lap_alias;
		$this->lap_sta_id = $lap_sta_id;
	}
}