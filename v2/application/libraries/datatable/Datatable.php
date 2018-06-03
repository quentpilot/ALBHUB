<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/datatable/IDatatable.php';

class Datatable implements IDatatable {

  public $title = null;

  public $describe = null;

  public $configs = null;

  public $builder = null;

  public $output = null;

  public function __construct($title = null, $describe = null) {
    $ci = &get_instance();
    $this->builder = $ci->table;
    $this->title = is_null($title) ? 'Data table' : $title;
    $this->describe = is_null($describe) ? 'List of a database table items query result' : $describe;
  }

  public function config($configs = null) {
    $this->configs = $configs;
    return $this;
  }

  public function build(array $data = NULL, $render = true) {
    $this->output = $this->prepare($data)
                         ->builder()
                         ->generate();
    if ($render)
      $this->view();
    return $this->output;
  }

  public function prepare($data = NULL) {
    if (!count($this->configs)) return null;
    $data = is_null($data) ? $this->configs['body'] : $data;
    $h_rows = isset($this->configs['head']) ? $this->configs['head'] : $data[0]->list_fields();
    $a_rows = isset($this->configs['action']) ? $this->configs['action'] : array();
    $b_rows = array();
    $names = array();
    $alias = array();
    $values = array();
    $actions = array();

    // build wanted columns name to use for data table
    foreach ($h_rows as $col => $name) {
      if ($col == 'tb_primary_key')
        $col = $data[0]->$col;
      if (property_exists($data[0], $data[0]->row($col))) {
        $col = $data[0]->row($col);
      }
      $tb_order_by = ($col == get_instance()->input->post('tb_order_by')) ? $col . ' DESC' : $col;
      if (property_exists($data[0], $col)) {
        $names[] = $col;
        $alias[] = '
          <form action="" method="POST">
            <input type="hidden" id="id_' . $col . '" name="tb_order_by" value="'.$tb_order_by.'">
            <button class="btn btn-sm btn-outline-primary" type="submit"
              title="Trier le résultat de recherche par '.$name.'"> ' . $name . ' &nbsp; <i class="fa fa-sort"></i>
            </button>
          </form>
        ';
      }
    }

    // set action row
    if (count($a_rows)) {
      $alias[] = '
        <button class="btn btn-sm btn-outline-primary" type="submit">
          Action &nbsp
          <i class="fa fa-gear"></i>
        </button>';
    }

    // build each row result
    foreach ($data as $it => $obj) {
      $b_rows = array();
      $tb_key = $obj->get('tb_primary_key');

      foreach ($names as $key => $col) {
        if (property_exists($obj, $col)) {
          $b_rows[] = $obj->get($col);
        } elseif (property_exists($obj, $obj->row($col))) {
          $b_rows[] = $obj->get($obj->row($col));
        }
      }

      // build actions rows
      $actions = array();
      foreach ($a_rows as $type => $config) {
        $tb_col = (!isset($config['col']) || !is_null($config['col'])) ? $tb_key : $config['col'];
        $btn_class = (!isset($config['col']) || !is_null($config['col'])) ? '' : $config['class'];
        $config['level'] = ($type == 'active' && $obj->get('sta_id') == 0) ? 'default' : $config['level'];

        $action = '
          <a class="btn btn-' . $config['level'] . ' btn-sm ' . $btn_class . '"
            href="' . $config['url'] . '/' . $type . '/' . $obj->get($tb_col) .
            '" type="button"' .
            'target="' . $config['target'] .
            '" title="' . $config['title'] . '">
            <i class="' . $config['icon'] . '"></i>
          </a> &nbsp;&nbsp;'
        ;

        $actions[] = $action;
      }

      $b_rows[] = implode(' ', $actions);
      $values = $b_rows;
      $this->add_rows($values);
    }

    $this->add_heading($alias);
    return $this->set_template();
  }

  public function view() {
    $ci = &get_instance();
    $data = array(
      'datatable' => $this,
      'datatable.title' => $this->title,
      'datatable.describe' => $this->describe,
      'datatable.output' => $this->output,
    );

    $output = $ci->parser->parse($this->configs['view'], $data, true);

    $this->output = $output;
    return true;
  }

  public function add_heading($rows = array()) {
    $this->builder->set_heading($rows);
    return $this;
  }

  public function add_rows($rows = array()) {
    $this->builder->add_row($rows);
    return $this;
  }

  public function builder($builder = null) {
    $this->builder = is_null($builder) ? $this->builder : $builder;
    return $this->builder;
  }

	public function set_template($config = null) {
		$template = array(
			'table_open'		=> '<table border="0" cellpadding="4" cellspacing="0" class="table table-striped table-hover">',
		);

    $template = is_null($config) ? $template : $config;

    $this->builder->set_template($template);
    return $this;
	}
}
