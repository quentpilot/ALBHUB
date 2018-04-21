<?php

/**
 * Datatable_builder aims to build dynamically class and properties related to tablename,
 * then store new class to libraries/tool/orm/database/tables/tablename_classname.php
 */

require_once APPPATH . 'libraries/tool/orm/builder/table/template/ILayout_builder.php';

class Layout_builder extends Table_builder implements ILayout_builder {

  public function __construct(string $tablename = null, $configs = null) {
    parent::__construct($tablename);
    $this->configs = is_null($configs) ? $configs : $configs;
  }

  public function process() : bool {
    return false;
  }

  public function format() : bool {
    return false;
  }

  public function property() : string {
    return null;
  }

  public function constructor() : string {
    return null;
  }

  public function output() : string {
    return null;
  }

  /*protected function create_class(string $portability = 'public', bool $var_type = false) {
    $classname = ucfirst($this->tablename);
    $tpl_head = "<?php\n\nclass $classname {\n\n";
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
      $tpl_construct_delim = (count($this->configs->column->result()) == $it) ? '' : $tpl_construct_delim;
      $tpl_construct .= $type . $attr . ' = null' . $tpl_construct_delim;
      $tpl_construct_cpy .= $tpl_construct_cpy_start . $col . ' = $' . $col . $tpl_construct_cpy_end;
      $it++;
    }

    $tpl_construct .= $tpl_construct_head_end . $tpl_construct_cpy . $tpl_construct_foot;
    $tpl .= $tpl_attr;
    $tpl .= $tpl_construct;
    $tpl .= $tpl_foot;
    return $tpl;
  }*/
}
