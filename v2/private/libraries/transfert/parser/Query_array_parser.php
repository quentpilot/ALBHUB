<?php

require_once APPPATH . 'libraries/transfert/parser/Parser.php';

/**
* Query_string_parser library class would to parse query following a type of array
*
* @date 2018-03-17
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see Transfert, Query as example
*/
class Query_array_parser extends Parser {

  public function __construct() {
    parent::__construct();
  }

  /**
  * parse method would to parse a query array
  */
  public function parse($query) : bool {
    $models = array();
    $methods = array();

    if (!$this->valid_type($query, 'array'))
      return false;

    foreach ($query as $key => $value) {
      $models[] = $key;
      $methods[] = $value;
    }
    $this->model = $models;
    $this->method = $methods;
    $this->commands = $query;
    return true;
  }
}
