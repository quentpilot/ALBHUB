<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reqs {
  public $model = array('page_model', 'landing_model');
  public $method = array('get_page', 'get_page');

  public function __construct() {}
}

class Landing extends MY_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index()
	{
    $req = array(
      'page_model' => 'get_page',
      'landing_model' => 'get_page',
      //'admin/admin_model' => 'get_page',
    );

    //print_r($this->request("page_model get_page, landing_model get_page"));
    //$this->request($req);
    //print_r($this->request($req));
    $response = $this->request($req);
    $this->render('index', $response);
	}

  public function bienvenue() {
    $this->render();
  }
}
