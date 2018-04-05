<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends MY_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index()
	{
    // init model methods to call
    $methods = array(
      'pages_model' => 'get_page',
      'landing_model' => 'get_page',
      //'admin/admin_model' => 'get_page',
    );

    // init method params to insert
    $params = array(
      'get_page' => 'coucou'
    );

    //print_r($this->request("page_model get_page, landing_model get_page"));
    //$this->request($req);
    //print_r($this->request($req));
    $response = $this->request($methods, $params);
    print_r($response);
    //print_r($this->category);

    //$this->render('index', $response);
	}

  public function bienvenue() {
    $this->render();
  }
}
