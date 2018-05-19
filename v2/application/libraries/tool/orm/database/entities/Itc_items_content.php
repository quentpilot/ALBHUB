<?php

class Itc_items_content extends Datatable_database {

	public $itc_id = 0;

	public $itc_itm_id = 0;

	public $itc_show_title = 0;

	public $itc_text_content = null;

	public $itc_tags = null;

	public $itc_url_name = null;

	public $itc_url_link = null;

	public $itc_url_target = null;

	public $itc_class_name = null;

	public $itc_class_content = null;

	public $itc_hits = 0;

	public function __construct(int $itc_id = 0, int $itc_itm_id = 0, int $itc_show_title = 0, string $itc_text_content = null, string $itc_tags = null, string $itc_url_name = null, string $itc_url_link = null, string $itc_url_target = null, string $itc_class_name = null, string $itc_class_content = null, int $itc_hits = 0) {
		$this->itc_id = $itc_id;
		$this->itc_itm_id = $itc_itm_id;
		$this->itc_show_title = $itc_show_title;
		$this->itc_text_content = $itc_text_content;
		$this->itc_tags = $itc_tags;
		$this->itc_url_name = $itc_url_name;
		$this->itc_url_link = $itc_url_link;
		$this->itc_url_target = $itc_url_target;
		$this->itc_class_name = $itc_class_name;
		$this->itc_class_content = $itc_class_content;
		$this->itc_hits = $itc_hits;
	}
}