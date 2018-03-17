<?php

require_once APPPATH . 'libraries/transfert/ITransfert.php';

/**
* Query_parser library class would to parse query following his type (string, array, object)
*
* It explodes query and store each model name and related method to load and launch by Transfert class
*
* @date 2018-03-17
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see Transfert, Query as example
*/
class Query_parser implements ITransfert {

  protected $model = null;

  protected $method = null;

  protected $commands = null;

  protected $error = null;

  public function __construct($query = null) {
    $this->parse($query);
  }

  public function parse($query) : bool {
    $this->clear();
    if (is_null($query)) {
      $this->error = "is_null";
      return false;
    }
    if (is_string($query))
      return $this->parse_string($query);
    elseif (is_array($query))
      return $this->parse_array($query);
    elseif (is_object($query))
      return $this->parse_object($query);
    else {
      $this->error = "bad_type";
      return false;
    }
    return false;
  }

  protected function parse_string(String $query) : bool {
    // allow explode space format => model method
    // allow explode comma format => model1 method1, model2 method 2
    // allow explode bracket format => [model1, method1] [model2, method2]
    if (count(explode(']', $query)))
      return $this->parse_string_bracket($query);
    $commands = explode(',', $query);
    $models = array();
    $methods = array();
    $cmds = array();


    foreach ($commands as $cmd) {
      $cmd = trim($cmd);
      $command = explode(' ', $cmd);
      if (count($command) < 2)
        return false;
      $models[] = $command[0];
      $methods[] = $command[1];
      $cmds[$command[0]] = $command[1];
    }
    $this->model = $models;
    $this->method = $methods;
    $this->commands = $cmds;
    return true;
  }

  protected function parse_string_bracket($query = null) : bool {
    return false;
  }

  protected function parse_array(array $query) : bool {
    $models = array();
    $methods = array();

    foreach ($query as $key => $value) {
      $models[] = $key;
      $methods[] = $value;
    }
    $this->model = $models;
    $this->method = $methods;
    $this->commands = $query;
    return true;
  }

  protected function parse_object(object $query) : bool {
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

  public function clear() {
    $this->model = null;
    $this->method = null;
    $this->commands = null;
    $this->error = null;
    return true;
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
