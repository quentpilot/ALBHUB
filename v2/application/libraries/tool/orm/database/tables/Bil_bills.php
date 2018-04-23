<?php

class bil_bills {

	public $bil_id = null;

	public $bil_name = null;

	public $bil_reference = null;

	public $bil_company_header = null;

	public $bil_client_header = null;

	public $bil_content = null;

	public $bil_published = null;

	public $bil_deadline = null;

	public $bil_bic_id = null;

	public $bil_sta_id = null;

	public function __construct($bil_id = null, $bil_name = null, $bil_reference = null, $bil_company_header = null, $bil_client_header = null, $bil_content = null, $bil_published = null, $bil_deadline = null, $bil_bic_id = null, $bil_sta_id = null) {
		$this->bil_id = $bil_id;
		$this->bil_name = $bil_name;
		$this->bil_reference = $bil_reference;
		$this->bil_company_header = $bil_company_header;
		$this->bil_client_header = $bil_client_header;
		$this->bil_content = $bil_content;
		$this->bil_published = $bil_published;
		$this->bil_deadline = $bil_deadline;
		$this->bil_bic_id = $bil_bic_id;
		$this->bil_sta_id = $bil_sta_id;
	}
}