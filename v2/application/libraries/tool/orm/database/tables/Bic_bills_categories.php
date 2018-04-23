<?php

class bic_bills_categories {

	public $bic_id = null;

	public $bic_name = null;

	public $bic_alias = null;

	public $bic_level = null;

	public $bic_sta_id = null;

	public function __construct($bic_id = null, $bic_name = null, $bic_alias = null, $bic_level = null, $bic_sta_id = null) {
		$this->bic_id = $bic_id;
		$this->bic_name = $bic_name;
		$this->bic_alias = $bic_alias;
		$this->bic_level = $bic_level;
		$this->bic_sta_id = $bic_sta_id;
	}
}