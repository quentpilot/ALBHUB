<?php

class itl_items_languages {

	public $itl_id = null;

	public $itl_itm_id = null;

	public $itl_lan_id = null;

	public $itl_sta_id = null;

	public function __construct($itl_id = null, $itl_itm_id = null, $itl_lan_id = null, $itl_sta_id = null) {
		$this->itl_id = $itl_id;
		$this->itl_itm_id = $itl_itm_id;
		$this->itl_lan_id = $itl_lan_id;
		$this->itl_sta_id = $itl_sta_id;
	}
}