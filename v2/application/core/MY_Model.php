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

   public function result($query = null) {
     return $query;
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
   public function get(string $property = null) {
     if (is_null($property))
       return false;
     if (property_exists($this, $property))
       return $this->$property;
   }

   /**
   * set method would to set attribute choosen with wanted value
   */
   public function set(string $property = null, $value = null) {
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

class MY_ORM_Model extends MY_Model implements IORM {

  public $it = 0;

  public $id = 0;

  public $alias = null;

  public $status = false;

  public $classname = null;

  public $datatable = null;

  public $prefix = null;

  public $delim = null;

  public $entity = null;

  protected $queries = null;

  protected $results = null;

  protected $table_builder = null;

  protected $entity_builder = null;

  protected $query = null;

  protected $result = null;

  protected $errors = null;

  public function __construct(string $datatable = null, string $classname = null, $id = 0, $delim = '_', $it = null, IDatatable_builder $table_builder = null, IEntity_builder $entity_builder = null, IORM_query $query = null, IORM_result $result = null) {
    parent::__construct();
    $this->delim = is_string($delim) ? $delim : '_';
    $this->id = $id;
    $this->it = (is_null($it) || !is_int($it)) ? ($this->it + 1) : $it;
    $this->datatable = is_null($datatable) ? $this->datatable : $datatable;
    $this->classname = is_null($classname) ? explode($this->delim, get_class($this))[0] . '_entity' : $classname;
    $this->prefix = is_null($this->datatable) ? null : explode($delim, $datatable)[0] . $delim;
    $this->table_builder = is_null($table_builder) ? new Datatable_builder($this->datatable) : $table_builder;
    $this->entity_builder = is_null($entity_builder) ? new Dataentity_builder($this->datatable, $this->classname) : $entity_builder;
    $this->query = is_null($query) ? new Datatable_query($this->datatable) : $query;
    $this->result = is_null($result) ? new Datatable_result($this->query) : $result;
    $this->entity = new Datatable_entity($this->datatable);
    $this->queries = array();
    $this->results = array();
  }

  public function query($query = null) {
    $query = is_null($query) ? $this->query : $query;
    if ($query instanceof IORM_query) {
      $this->query = $query;
      $this->query->tablename = $this->get_tablename();
      $this->prefix = is_null($this->datatable) ? null : explode($this->delim, $this->datatable)[0] . $this->delim;
      return $this->query;
    }
    return false;
  }

  public function result($query = null) {
    $response = $this->query->result();
    $this->result = $response;
    return $this->result;
  }

  public function entity(string $classname = null, string $tablename = null, string $repository = null) {
    $tablename = is_null($tablename) ? $this->datatable : $tablename;
    $classname = is_null($classname) ? $tablename : $classname;

    $this->entity_builder->set('repository', $repository);
    $this->entity_builder->build($tablename, $classname);
    $this->entity = $this->entity_builder->result();
    return $this->entity;
  }

  public function refresh(array $tables = array(), bool $return = false) {
    return $this->table_builder->refresh_datatables($tables, $return);
  }

  public function iterate($id = null) {
    if (is_null($id)) {
      $this->it = $this->it + 1;
      return $this->it;
    }
    $it = (is_int($id) || is_numeric($id)) ? $this->it + $id : $id;
    $this->it = $it;
    return $it;
  }

  public function queries($id = null) {
    $id = is_null($id) ? $this->it : $id;
    if (is_array($this->queries) && count($this->queries)) {
      if (isset($this->queries[$id]))
        return $this->queries[$id];
    }
    return null;
  }

  public function results($id = null) {
    $id = is_null($id) ? $this->it : $id;
    if (is_array($this->results) && count($this->results)) {
      if (isset($this->results[$id]))
        return $this->results[$id];
    }
    return null;
  }

  public function new_datatable(string $datatable, bool $refresh = false) {
    if ($refresh && !$this->refresh()) return null;
    if ($this->table_builder->build($datatable))
      return $this->get_datatable();
    return null;
  }

  public function get_datatable() {
    return $this->table_builder->object;
  }

  public function set_datatable(string $datatable = null) {
    $datatable = is_null($datatable) ? $this->datatable : $datatable;
    if (is_null($datatable)) return false;
    return $this->new_datatable($datatable);
  }

  public function get_tablename(bool $build = true) : string {
    $tablename = ($build) ? $this->prefix . $this->delim . $this->datatable : $this->datatable;
    return $tablename;
  }

  public function set_tablename(string $datatable = null, string $delim = '_') {
    $datatable = is_null($datatable) ? $this->datatable : $datatable;
    if (is_null($datatable) || is_null($delim)) return false;
    $exp = explode($delim, $datatable);
    $prefix = $exp[0] . $delim;
    $this->datatable = $datatable;
    $this->prefix = $prefix;
    $this->delim = $delim;
    return true;
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
}

class MY_Manager_Model extends MY_ORM_Model {

  protected $setting = null;

  protected $dao = null;

  protected $format = null;

  protected $form = null;

  public function __construct(string $datatable = null, string $classname = null, $id = 0, $delim = '_', $it = null, IDatatable_builder $table_builder = null, IEntity_builder $entity_builder = null, IORM_query $query = null, IORM_result $result = null, string $type = null, IDao_manager $dao = null, IFormat_manager $format = null, IForm_manager $form = null) {
    parent::__construct($datatable, $classname, $id, $delim, $it, $table_builder, $entity_builder, $query, $result, $dao, $format);
    $part = $this->uri->segment(4);
    $type = is_null($type) ? substr($part, 0, strlen($part)) : $type;
    $this->type = $type;
    //$this->load();
    $this->load(array('setting', 'dao', 'format', 'form'));
    $this->dao = is_null($dao) ? $this->dao : $dao;
    $this->format = is_null($format) ? $this->format : $format;
    $this->form = is_null($form) ? $this->form : $form;
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
