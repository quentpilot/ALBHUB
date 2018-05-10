<?php

class Joc_jobs_categories {

	public $joc_id = null;

	public $joc_name = null;

	public $joc_alias = null;

	public $joc_level = null;

	public $joc_sta_id = null;

	public function __construct($joc_id = null, $joc_name = null, $joc_alias = null, $joc_level = null, $joc_sta_id = null) {
		$this->joc_id = $joc_id;
		$this->joc_name = $joc_name;
		$this->joc_alias = $joc_alias;
		$this->joc_level = $joc_level;
		$this->joc_sta_id = $joc_sta_id;
	}
}