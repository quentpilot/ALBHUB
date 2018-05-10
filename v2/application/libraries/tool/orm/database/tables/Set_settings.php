<?php

class Set_settings {

	public $id = null;

	public $site_name = null;

	public $site_url = null;

	public $contact_email = null;

	public $contact_phone = null;

	public $fonts = null;

	public $fg_color = null;

	public $bg_color = null;

	public $app_id = null;

	public $tpl_id = null;

	public $status_id = null;

	public function __construct($id = null, $site_name = null, $site_url = null, $contact_email = null, $contact_phone = null, $fonts = null, $fg_color = null, $bg_color = null, $app_id = null, $tpl_id = null, $status_id = null) {
		$this->id = $id;
		$this->site_name = $site_name;
		$this->site_url = $site_url;
		$this->contact_email = $contact_email;
		$this->contact_phone = $contact_phone;
		$this->fonts = $fonts;
		$this->fg_color = $fg_color;
		$this->bg_color = $bg_color;
		$this->app_id = $app_id;
		$this->tpl_id = $tpl_id;
		$this->status_id = $status_id;
	}
}