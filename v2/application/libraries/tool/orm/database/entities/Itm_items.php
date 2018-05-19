<?php

class Itm_items extends Datatable_database {

	public $itm_id = 0;

	public $itm_title = null;

	public $itm_subtitle = null;

	public $itm_slug = null;

	public $itm_published = null;

	public $itm_edited = null;

	public $itm_table_content = null;

	public $itm_usr_id = 0;

	public $itm_ilp_id = 0;

	public $itm_sta_id = 0;

	public function __construct(int $itm_id = 0, string $itm_title = null, string $itm_subtitle = null, string $itm_slug = null, string $itm_published = null, string $itm_edited = null, string $itm_table_content = null, int $itm_usr_id = 0, int $itm_ilp_id = 0, int $itm_sta_id = 0) {
		$this->itm_id = $itm_id;
		$this->itm_title = $itm_title;
		$this->itm_subtitle = $itm_subtitle;
		$this->itm_slug = $itm_slug;
		$this->itm_published = $itm_published;
		$this->itm_edited = $itm_edited;
		$this->itm_table_content = $itm_table_content;
		$this->itm_usr_id = $itm_usr_id;
		$this->itm_ilp_id = $itm_ilp_id;
		$this->itm_sta_id = $itm_sta_id;
	}
}