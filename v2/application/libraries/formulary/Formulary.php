<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/formulary/IFormulary.php';

class Formulary implements IFormulary {

  public $title = null;

  public $describe = null;

  public $configs = null;

  public $input = null;

  public $validation = null;

  public $rules = null;

  public $fields = null;

  public $builder = null;

  public $output = null;

  public function __construct($title = null, $describe = null) {
    $ci = &get_instance();
    $this->input = $ci->input;
    $this->validation = $ci->form_validation;
    $this->fields = $ci->formulary_fields;
    $this->builder = $ci->formulary_generator;
    $this->title = is_null($title) ? 'Formulary Edition' : $title;
    $this->describe = is_null($describe) ? 'Fields allowed to be edited' : $describe;
  }

  public function config($configs = null) {
    $this->configs = $configs;
    return $this;
  }

  public function build(array $data = NULL, $render = true) {
    $valid = $this->prepare($data)
                  ->validation();

    //if ($valid) {
      $form = $this->builder()
                   ->generate();
      $this->output = $form->output;
    //}
    if ($render) {
      $this->view();
    }
    return $this->output;
  }

  public function prepare($data = NULL) {
    $this->output = null;
    $config_rules = 'manager/items';
    $rules = array();
    $this->rules = $rules;
    $this->fields->generate($this->configs['fields']);
    $this->builder->fields = $this->fields();
    return $this;
  }

  public function input($method = NULL, $params = null) {
    $method = is_null($method) ? 'post' : $method;

    if (is_null($params))
      return $this->input->$method();
    return $this->input->$method($params);
  }

  public function validation($rules = null) {
    $rules = is_null($rules) ? $this->rules : $rules;

    if (is_string($rules)) {
      return $this->validation->run($rules);
    }
    elseif (is_array($rules)) {
      $this->validation->set_rules($rules);
      return $this->validation->run();
    }
    return null;
  }

  public function fields() {
    return $this->fields;
  }

  public function builder($builder = null) {
    $this->builder = is_null($builder) ? $this->builder : $builder;
    return $this->builder;
  }

  public function view() {
    $ci = &get_instance();
    $data = array(
      'form' => $this->builder,
      'form.title' => $this->title,
      'form.describe' => $this->describe,
      'form.output' => $this->fields->output,
      'form.class.col' => $this->configs['class_col'],
    );

    $output = $ci->parser->parse($this->configs['view'], $data, true);

    $this->output = $output;
    return true;
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
