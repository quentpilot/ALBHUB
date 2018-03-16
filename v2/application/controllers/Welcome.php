<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function index()
	{
		$data = array(
			'title' => 'Haby'
		);
		$this->render('welcome', $data);
	}

	public function about()
	{
		$data = array(
			'title' => 'About Haby'
		);
    $this->render('about', $data);
	}

	public function examples()
	{
		$data = array(
			'title' => 'Haby Examples Code'
		);
    $this->render('examples/index', $data);
	}

	public function documentation()
	{
		$data = array(
			'title' => 'Haby Doc'
		);
    $this->render('documentation/index', $data);
	}

	public function contact()
	{
		$data = array(
			'title' => 'Haby Contact'
		);
    $this->render('contact', $data);
	}
}
