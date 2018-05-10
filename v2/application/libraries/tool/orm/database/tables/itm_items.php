<?php

class itm_items {

	public $itm_id = null;

	public $itm_title = null;

	public $itm_subtitle = null;

	public $itm_slug = null;

	public $itm_published = null;

	public $itm_edited = null;

	public $itm_table_content = null;

	public $itm_usr_id = null;

	public $itm_ilp_id = null;

	public $itm_sta_id = null;

	public function __construct($itm_id = null, $itm_title = null, $itm_subtitle = null, $itm_slug = null, $itm_published = null, $itm_edited = null, $itm_table_content = null, $itm_usr_id = null, $itm_ilp_id = null, $itm_sta_id = null) {
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