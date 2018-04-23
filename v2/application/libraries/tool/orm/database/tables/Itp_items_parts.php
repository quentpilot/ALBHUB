<?php

class itp_items_parts {

	public $itp_itm_id = null;

	public $itp_ilp_id = null;

	public $itp_sta_id = null;

	public function __construct($itp_itm_id = null, $itp_ilp_id = null, $itp_sta_id = null) {
		$this->itp_itm_id = $itp_itm_id;
		$this->itp_ilp_id = $itp_ilp_id;
		$this->itp_sta_id = $itp_sta_id;
	}
}