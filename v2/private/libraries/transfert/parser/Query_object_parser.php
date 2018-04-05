<?php

require_once APPPATH . 'libraries/transfert/parser/Parser.php';

/**
* Query_string_parser library class would to parse query following a type of object
*
* @date 2018-03-17
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see Transfert, Query as example
*/
class Query_object_parser extends Parser {

  public function __construct() {
    parent::__construct();
  }

  /**
  * parse method would to parse a query object
  */
  public function parse($query) : bool {
    if (!$this->valid_instance($query))
      return false;
    if (property_exists($query, 'model') && property_exists($query, 'method')) {
      $this->model = $query->model;
      $this->method = $query->method;
      if (!$this->obj_to_array_assoc())
        return false;
      return true;
    } elseif (property_exists($query, 'models') && property_exists($query, 'methods')) {
      $this->model = $query->models;
      $this->method = $query->methods;
      if (!$this->obj_to_array_assoc())
        return false;
      return true;
    }
    return false;
  }

  /**
  * obj_to_array_assoc method would to help query object parser to identify model(s) and method(s)
  */
  protected function obj_to_array_assoc() {
    if (is_null($this->model) || is_null($this->method))
      return false;
    $models = (is_array($this->model)) ? $this->model : array($this->model);
    $method = (is_array($this->method)) ? $this->method : array($this->method);
    if (count($models) != count($methods))
      return false;
    $commands = array();

    for ($it = 0; $it < count($models); $it++) {
      $commands[$models[$it]] = $methods[$it];
    }
    $this->commands = $commands;
    print_r($this->commands);
    return true;
  }
}
