<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->render();
	}

	public function a_propos() {
    $this->render();
  }

  public function nos_services() {
    $this->render();
  }

  public function nous_contacter() {
    $this->render();
  }

	public function nos_realisations() {
    $this->render();
  }

	public function portfolio($article) {
    $this->render();
  }

	public function project($name) {
    $this->render();
  }
}
