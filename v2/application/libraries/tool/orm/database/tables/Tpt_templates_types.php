<?php

class tpt_templates_types {

	public $tpt_id = null;

	public $tpt_name = null;

	public $tpt_alias = null;

	public $tpt_sta_id = null;

	public function __construct($tpt_id = null, $tpt_name = null, $tpt_alias = null, $tpt_sta_id = null) {
		$this->tpt_id = $tpt_id;
		$this->tpt_name = $tpt_name;
		$this->tpt_alias = $tpt_alias;
		$this->tpt_sta_id = $tpt_sta_id;
	}
}