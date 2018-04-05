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

   protected $response = null;
   protected $use_query_parser = false;
   protected $error = null;

   public function __construct($request = null, $process = false, $use_query_parser = false) {
     parent::__construct();
     /*$this->use_query_parser = $use_query_parser;*/
     //$this->request = ((is_string($request)) || (is_array($request)) || $request instanceof Req) ? $request : new req();

     // once use_request_parser defined, check through AI parser if request is ok (string, array or instance...)
     $this->response = ($process) ? $this->build() : new Res();
   }

   public function init(array $attributes) : bool {
     foreach ($attributes as $key => $value) {
       if (!$this->set($key, $value))
        return false;
     }
     return true;
   }

   public function response($query = null, $data = null, $type = null) {
     $this->response->query($query, $data, $type);
     return $this->response->result();
   }

   public function result($data = null) {
     return $data;
   }

   protected function build() {
     return new Res();
   }

   public function select() {
     return false;
   }

   public static function new() {
     return null;
   }

   public function create($query) : bool {
     return false;
   }

   public function insert($query) : bool {
     return false;
   }

   public function update($query) : bool {
     return false;
   }

   public function delete($query) : bool {
     return false;
   }

   public function exists($id = null) : bool {
     return false;
   }

   public function count($query) : int {
     return false;
   }

   /**
   * get method would to return class attribute value entered as param
   */
   public function get($property = null) {
     if (is_null($property))
       return false;
     if (property_exists($this, $property))
       return $this->$property;
   }

   /**
   * set method would to set attribute choosen with wanted value
   */
   public function set($property = null, $value = null) {
     if (is_null($property))
       return false;
     if (property_exists($this, $property)) {
       $this->$property = $value;
       return $value;
     }
     return null;
   }
}
