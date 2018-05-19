<?php

class Ilp_items_layouts_parts extends Datatable_database {

	public $ilp_id = 0;

	public $ilp_name = null;

	public $ilp_alias = null;

	public $ilp_lap_id = 0;

	public $ilp_sta_id = 0;

	public function __construct(int $ilp_id = 0, string $ilp_name = null, string $ilp_alias = null, int $ilp_lap_id = 0, int $ilp_sta_id = 0) {
		$this->ilp_id = $ilp_id;
		$this->ilp_name = $ilp_name;
		$this->ilp_alias = $ilp_alias;
		$this->ilp_lap_id = $ilp_lap_id;
		$this->ilp_sta_id = $ilp_sta_id;
	}
}