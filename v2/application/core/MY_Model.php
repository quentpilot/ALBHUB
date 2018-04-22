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

   protected $datatable = null;

   protected $prefix = null;

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

   protected function _config(array $config = null) {
     return false;
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

   public function query() {
     return false;
   }

   public function result($data = null) {
     return $data;
   }

   protected function build() {
     return new Res();
   }

   public function select($query = null) {
     return false;
   }

   public function new($query = null) {
     return false;
   }

   public function create(IQuery_builder $query = null) {
     return false;
   }

   public function insert($query = null) {
     return false;
   }

   public function update($query = null) {
     return false;
   }

   public function delete($query = null) {
     return false;
   }

   public function exists($id = null) {
     return false;
   }

   public function count($query = null) {
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

class MY_Session_Model extends MY_Model {
  public function __construct(string $datatable = null, string $prefix = '') {
    parent::__construct();
    $this->datatable = $datatable;
    $this->prefix = $prefix;
  }
}

class MY_Admin_Model extends MY_Model {

  public function __construct($request = null, $process = false, $use_query_parser = false) {
    parent::__construct($request, $process, $use_query_parser);
  }
}

class MY_DAO_Model extends MY_Model {

  public function __construct() {
    parent::__construct();
  }

  protected function _config(array $config = null) {
    $config = is_null($config) ? $this->config : $config;
    // load ORM libraries
    $this->_load_libraries($config);
    return true;
  }

  protected function _load_libraries($config) {
    $lib_config = is_object($config)
                    ? $config->item('orm')['load_libraries']
                    : $config['orm']['load_libraries'];
    $lib_config = isset($lib_config) ? $lib_config : null;
    if (!is_null($lib_config) && is_array($lib_config)) {
      $it = 1;
      foreach ($lib_config as $class) {
        //$pre = ($it == count($lib_config)) ? '' : 'orm/';
        $pre = 'orm/';
        $this->load->library('tool/' . $pre . $class);
        $it++;
      }
      $this->load->library('tool/' . $pre . 'orm');
      return true;
    }
    return false;
  }

  protected function orm(string $tablename = null, string $delim = '_') {
    $tablename = is_null($tablename) ? $this->prefix . $this->datatable : $tablename;
    $delim = is_null($delim) ? '_' : $delim;
    $this->orm->set_tablename($tablename, $delim);
    return $this->orm;
  }

  public function create(IQuery_builder $query = null) {
    return false;
  }

  public function rule($rule = null) {
    $rule = (is_array($rule)) ? $rule : array($rule);
    return $rule;
  }

  public function select($query = null) {
    $query = $this->rule($query);
    return $this->orm()->query()->select($query);
  }

  public function new($query = null) {
    return $this->orm()->set_datatable();
  }

  public function insert($query = null) {
    $query = $this->rule($query);
    return $this->orm()->query()->insert($query);
  }

  public function update($query = null) {
    $query = $this->rule($query);
    return $this->orm()->query()->update($query);
  }

  public function delete($query = null) {
    $query = $this->rule($query);
    return $this->orm()->query()->delete($query);
  }

  public function copy($query = null) {
    $query = $this->rule($query);
    return $this->orm()->query()->copy($query);
  }

  public function exists($id = null) {
    return false;
  }

  public function count($query = null) {
    return false;
  }

  public function result($data = null) {
    return $this->orm->result();
  }
}

class MY_Manager_Model extends MY_DAO_Model {

  protected $setting = null;

  protected $dao = null;

  protected $format = null;

  protected $type = null;

  protected $result = null;

  public function __construct(IDao_manager $dao = null, IFormat_manager $format = null, string $type = null) {
    parent::__construct();
    $part = $this->uri->segment(4);
    $type = is_null($type) ? substr($part, 0, strlen($part)) : $type;
    $this->type = $type;
    //$this->load();
    $this->load(array('setting', 'dao', 'format'));
  }

  protected function load(array $tools, $type = null) {
    if (!count($tools)) return false;

    foreach ($tools as $tool) {
      if (property_exists($this, $tool)) {
        $this->type = is_null($type) ? $this->type : $type;
        $class_name_suffix = '_manager_'.$tool;
        $class_name = is_null($this->type) ? 'Items' : ucfirst($this->type);
        $class_name .= $class_name_suffix;
        $tool_instance = null;

        if (class_exists($class_name))
          $tool_instance = new $class_name();
        $tool_interface = 'I'.ucfirst($tool).'_manager';

        if ($tool_instance instanceof $tool_interface) {
          $tool_instance = is_null($this->$tool) ? $tool_instance : $this->$tool;
          $this->$tool = $tool_instance;
        }
        //print_r($this->setting);
      }
    }
    return true;
  }

  protected function tools($tools, $types, $configs = null) {
    if (is_null($tools))
      return null;
    $types = is_null($types) ? $this->type : $types;
    $configs = is_null($configs) ? $this->setting : $configs;
    $results = array();

    if (is_array($tools) && is_array($types) && (count($tools) == count($types))) {
      foreach ($tools as $key => $tool) {
        if (property_exists($this, $tool)) {
          $type = $types[$key];
          $method = 'load_' . $type;
          if (method_exists($this->$tool, $method)) {
            $config = (is_array($configs)) ? $configs[$key] : $this->setting;
            $this->$tool->$method($config);
            $this->setting = $this->$tool->get('configs');
            $results[$tool.'.'.$type] = $this->$tool->load_result();
          }
        }
      }
      $this->result = $results;
      return $this->result;
    } elseif (is_string($tools) && is_string($types) && $configs instanceof Setting_manager) {
      if (property_exists($this, $tools)) {
        $type = is_null($types) ? $this->type : $types;
        $method = 'load_' . $type;
        if (method_exists($this->$tools, $method)) {
          $this->$tools->$method($configs);
          $results = $this->$tools->load_result();
          $this->setting = $this->$tools->get('configs');
          $this->result = $results;
          return $results;
        }
      }
    }
    return null;
  }

  protected function set_configs(ISetting_manager $configs = null) {
    $this->setting = is_null($configs) ? $this->setting : $configs;
    return true;
  }
}
