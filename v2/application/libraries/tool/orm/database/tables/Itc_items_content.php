<?php

class Itc_items_content {

	public $itc_item_id = null;

	public $itc_show_title = null;

	public $itc_text_content = null;

	public $itc_tags = null;

	public $itc_url_name = null;

	public $itc_url_link = null;

	public $itc_url_target = null;

	public $itc_class_name = null;

	public $itc_class_content = null;

	public function __construct($itc_item_id = null, $itc_show_title = null, $itc_text_content = null, $itc_tags = null, $itc_url_name = null, $itc_url_link = null, $itc_url_target = null, $itc_class_name = null, $itc_class_content = null) {
		$this->itc_item_id = $itc_item_id;
		$this->itc_show_title = $itc_show_title;
		$this->itc_text_content = $itc_text_content;
		$this->itc_tags = $itc_tags;
		$this->itc_url_name = $itc_url_name;
		$this->itc_url_link = $itc_url_link;
		$this->itc_url_target = $itc_url_target;
		$this->itc_class_name = $itc_class_name;
		$this->itc_class_content = $itc_class_content;
	}
}