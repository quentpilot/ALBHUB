<?php

class tpl_templates {

	public $tpl_id = null;

	public $tpl_name = null;

	public $tpl_alias = null;

	public $tpl_tpt_id = null;

	public $tpl_sta_id = null;

	public function __construct($tpl_id = null, $tpl_name = null, $tpl_alias = null, $tpl_tpt_id = null, $tpl_sta_id = null) {
		$this->tpl_id = $tpl_id;
		$this->tpl_name = $tpl_name;
		$this->tpl_alias = $tpl_alias;
		$this->tpl_tpt_id = $tpl_tpt_id;
		$this->tpl_sta_id = $tpl_sta_id;
	}
}