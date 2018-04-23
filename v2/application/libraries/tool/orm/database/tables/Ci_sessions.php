<?php

class ci_sessions {

	public $id = null;

	public $ip_address = null;

	public $timestamp = null;

	public $data = null;

	public function __construct($id = null, $ip_address = null, $timestamp = null, $data = null) {
		$this->id = $id;
		$this->ip_address = $ip_address;
		$this->timestamp = $timestamp;
		$this->data = $data;
	}
}