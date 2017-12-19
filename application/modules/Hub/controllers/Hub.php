<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hub extends HUB_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()  {
		parent::__construct('Hub');
	}

	public function index()
	{
		$this->render($this->loadpath());
	}
}
