<?php

class Lap_layout_parts extends Datatable_database {

	public $lap_id = 0;

	public $lap_name = null;

	public $lap_alias = null;

	public $lap_sta_id = 0;

	public function __construct(int $lap_id = 0, string $lap_name = null, string $lap_alias = null, int $lap_sta_id = 0) {
		$this->lap_id = $lap_id;
		$this->lap_name = $lap_name;
		$this->lap_alias = $lap_alias;
		$this->lap_sta_id = $lap_sta_id;
	}
}