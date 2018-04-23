<?php

class ema_emails {

	public $ema_id = null;

	public $ema_subject = null;

	public $ema_message = null;

	public $ema_send_from = null;

	public $ema_send_to = null;

	public $ema_type = null;

	public $ema_sta_id = null;

	public function __construct($ema_id = null, $ema_subject = null, $ema_message = null, $ema_send_from = null, $ema_send_to = null, $ema_type = null, $ema_sta_id = null) {
		$this->ema_id = $ema_id;
		$this->ema_subject = $ema_subject;
		$this->ema_message = $ema_message;
		$this->ema_send_from = $ema_send_from;
		$this->ema_send_to = $ema_send_to;
		$this->ema_type = $ema_type;
		$this->ema_sta_id = $ema_sta_id;
	}
}