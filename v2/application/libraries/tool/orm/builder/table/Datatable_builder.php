<?php

/**
 * Datatable_builder aims to build dynamically class and properties related to tablename,
 * then store new class to libraries/tool/orm/database/tables/tablename_classname.php
 */

require_once APPPATH . 'libraries/tool/orm/builder/table/IDatatable_builder.php';

class Datatable_builder implements IDatatable_builder {

  protected $ci = null;

  protected $tablename = null;

  protected $classname = null;

  protected $folder = null;

  protected $type = null;

  protected $column = null;

  protected $layout = null;

  public $object = null;

  public function __construct(string $tablename = null, string $classname = null, Datacolumn_builder $column = null, Layout_builder $layout = null) {
    $this->ci = &get_instance();
    $this->tablename = strtolower($tablename);
    $this->classname = ucfirst($classname);
    $this->folder = APPPATH . 'libraries/tool/orm/database/';
    $this->type = 'tables';
    $this->column = is_null($column) ? new Datacolumn_builder($tablename) : $column;
    $this->layout = is_null($layout) ? new Datalayout_builder() : $layout;
    if (!is_null($tablename) && $this->build())
      return true;
    return false;
  }

  public function build(string $tablename = null, string $classname = null) : bool {
    $tablename = is_null($tablename) ? $this->tablename : strtolower($tablename);
    $classname = is_null($classname) ? $this->classname : ucfirst($classname);
    if (is_null($tablename))
      return false;
    $this->tablename = $tablename;
    if ($this->class_exists()) {
      $this->object = $this->get_class();
      return true;
    }
    elseif ($this->process())
      return true;
    return false;
  }

  protected function process() : bool {
    // create class
    if (!$this->column->build($this->tablename))
      return false;
    if (!$this->create_class())
      return false;
    $this->object = $this->get_class();
    return true;
  }

  protected function create_class(string $portability = 'public', bool $var_type = false) {
    //$tpl = $this->layout->build();
    $classname = is_null($this->classname) ? ucfirst($this->tablename) : $this->classname;
    $tpl_head = "<?php\n\nclass $this->tablename {\n\n";
    $tpl_attr_start = "\t$portability ";
    $tpl_attr_end = ' = null;';
    $tpl_attr = '';
    $tpl_construct_head_start = "\tpublic function __construct(";
    $tpl_construct_head_end = ") {\n";
    $tpl_construct_foot = "\t}\n";
    $tpl_construct_delim = ', ';
    $tpl_construct = $tpl_construct_head_start;
    $tpl_construct_cpy_start = "\t\t" . '$this->';
    $tpl_construct_cpy_end = ";\n";
    $tpl_construct_cpy = '';
    $tpl_foot = "}";
    $tpl = '';
    $tpl .= $tpl_head;
    $it = 1;

    // build attributes and constructor
    $result = $this->column->result();
    foreach ($result as $cols => $col) {
      $type = ($var_type) ? $cols['type'] : '';
      //$attr = '$' . $cols['name'];
      $attr = '$' . $col;
      $tpl_attr .= $tpl_attr_start . $attr . $tpl_attr_end . PHP_EOL . PHP_EOL;
      $tpl_construct_delim = (count($this->column->result()) == $it) ? '' : $tpl_construct_delim;
      $tpl_construct .= $type . $attr . ' = null' . $tpl_construct_delim;
      $tpl_construct_cpy .= $tpl_construct_cpy_start . $col . ' = $' . $col . $tpl_construct_cpy_end;
      $it++;
    }

    $tpl_construct .= $tpl_construct_head_end . $tpl_construct_cpy . $tpl_construct_foot;
    $tpl .= $tpl_attr;
    $tpl .= $tpl_construct;
    $tpl .= $tpl_foot;
    return $this->save_class($tpl);
  }

  protected function save_class(string $template) {
    $classname = ucfirst($this->tablename) . '.php';
    $file = $this->folder . $this->type . '/' .$classname;
    return file_put_contents($file, $template);
  }

  protected function class_exists() : bool {
    $path = $this->folder . $this->type;
    $files = scandir($path);
    if (!$files)
      return false;

    foreach ($files as $key => $value) {
      $value = strtolower($value);
      if ($value == $this->tablename . '.php') {
        return true;
      }
    }
    return false;
  }

  protected function get_class() {
    $classname = ucfirst($this->tablename);
    $file = $this->folder . $this->type . '/' . $classname . '.php';

    if (file_exists($file)) {
      include_once($file);
      if (class_exists($classname))
        $object = new $classname();
      return $object;
    }
    return null;
  }

  public function table_exists(string $tablename) : bool {
    $tablename = strtolower($tablename);
    $table = $this->ci->db->table_exists($tablename);
    //$table = $this->ci->db->query("SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'$tablename'")->result();
    if ($table) return true;
    return false;
  }

  public function refresh_datatables(array $tables = array(), bool $return = false) {
    $tables = count($tables) ? $tables : '*';
    $datatables = $this->ci->db->list_tables();
    $new_tables = array();
    $select = (is_array($tables) && count($tables)) ? $tables : $datatables;

    if (!$datatables || !count($datatables)) return false;

    foreach ($datatables as $table => $name) {
      if (is_array($select) && count($select) && in_array($name, $select)) {
        $this->tablename = strtolower($name);
        if ($this->process())
          $new_tables[] = $this->object;
      }
    }

    $this->object = $new_tables;
    $result = ($return) ? $new_tables : count($new_tables);
    return $result;
  }

  /**
  * get method would to return class attribute value entered as param
  */
  public function get(string $property) {
    if (is_null($property))
      return false;
    if (property_exists($this, $property))
      return $this->$property;
  }

  /**
  * set method would to set attribute choosen with wanted value
  */
  public function set(string $property, $value = null) {
    if (is_null($property))
      return false;
    if (property_exists($this, $property)) {
      $this->$property = $value;
      return $value;
    }
    return null;
  }
}