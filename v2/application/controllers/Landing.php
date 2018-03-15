<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends MY_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index()
	{
    //print_r($this->config->config);
    //print_r($this->render->get('template'));
		//$this->load->view('welcome_message');
    //$this->render('index', null, false, true);
    $this->render();
	}
}
