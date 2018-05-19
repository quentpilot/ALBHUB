<?php

class Itl_items_languages extends Datatable_database {

	public $itl_id = 0;

	public $itl_itm_id = 0;

	public $itl_lan_id = 0;

	public $itl_sta_id = 0;

	public function __construct(int $itl_id = 0, int $itl_itm_id = 0, int $itl_lan_id = 0, int $itl_sta_id = 0) {
		$this->itl_id = $itl_id;
		$this->itl_itm_id = $itl_itm_id;
		$this->itl_lan_id = $itl_lan_id;
		$this->itl_sta_id = $itl_sta_id;
	}
}