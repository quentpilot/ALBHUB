<?php

class Tpa_templates_applications {

	public $tpa_id = null;

	public $tpa_tpl_id = null;

	public $tpa_app_id = null;

	public $tpa_sta_id = null;

	public function __construct($tpa_id = null, $tpa_tpl_id = null, $tpa_app_id = null, $tpa_sta_id = null) {
		$this->tpa_id = $tpa_id;
		$this->tpa_tpl_id = $tpa_tpl_id;
		$this->tpa_app_id = $tpa_app_id;
		$this->tpa_sta_id = $tpa_sta_id;
	}
}