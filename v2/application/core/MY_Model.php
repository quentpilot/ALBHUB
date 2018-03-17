<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

   protected $request = null;
   protected $response = null;
   protected $use_query_parser = false;

   public function __construct($request = null, $process = false, $use_query_parser = false) {
     parent::__construct();
     /*$this->use_query_parser = $use_query_parser;
     $this->request = ((is_string($request)) || (is_array($request)) || $request instanceof Req) ?? $request ?? null;
     // once use_request_parser defined, check through AI parser if request is ok (string, array or instance...)
     $this->response = ($process) ? $this->build() : null;*/
   }

   public function response($query = null, $data = null, $type = null, $result = null) {
     $this->response->query($query, $data, $type);
     return $this->response->result();
   }

   public function result($data = null) {
     return $data;
   }

   protected function build() {
     return new Res();
   }


}
