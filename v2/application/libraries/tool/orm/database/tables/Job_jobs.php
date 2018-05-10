<?php

class Job_jobs {

	public $job_id = null;

	public $job_name = null;

	public $job_description = null;

	public $job_sta_id = null;

	public function __construct($job_id = null, $job_name = null, $job_description = null, $job_sta_id = null) {
		$this->job_id = $job_id;
		$this->job_name = $job_name;
		$this->job_description = $job_description;
		$this->job_sta_id = $job_sta_id;
	}
}