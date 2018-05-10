<?php

class Lay_layouts {

	public $lay_id = null;

	public $lay_name = null;

	public $lay_alias = null;

	public $lay_sta_id = null;

	public function __construct($lay_id = null, $lay_name = null, $lay_alias = null, $lay_sta_id = null) {
		$this->lay_id = $lay_id;
		$this->lay_name = $lay_name;
		$this->lay_alias = $lay_alias;
		$this->lay_sta_id = $lay_sta_id;
	}
}