<?php

class lat_layouts_templates {

	public $lat_id = null;

	public $lat_lay_id = null;

	public $lat_tpl_id = null;

	public $lat_sta_id = null;

	public function __construct($lat_id = null, $lat_lay_id = null, $lat_tpl_id = null, $lat_sta_id = null) {
		$this->lat_id = $lat_id;
		$this->lat_lay_id = $lat_lay_id;
		$this->lat_tpl_id = $lat_tpl_id;
		$this->lat_sta_id = $lat_sta_id;
	}
}