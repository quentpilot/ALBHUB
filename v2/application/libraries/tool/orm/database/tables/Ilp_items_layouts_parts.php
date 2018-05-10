<?php

class Ilp_items_layouts_parts {

	public $ilp_id = null;

	public $ilp_name = null;

	public $ilp_alias = null;

	public $ilp_lap_id = null;

	public $ilp_sta_id = null;

	public function __construct($ilp_id = null, $ilp_name = null, $ilp_alias = null, $ilp_lap_id = null, $ilp_sta_id = null) {
		$this->ilp_id = $ilp_id;
		$this->ilp_name = $ilp_name;
		$this->ilp_alias = $ilp_alias;
		$this->ilp_lap_id = $ilp_lap_id;
		$this->ilp_sta_id = $ilp_sta_id;
	}
}