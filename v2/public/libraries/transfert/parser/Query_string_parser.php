<?php

require_once APPPATH . 'libraries/transfert/parser/Parser.php';

/**
* Query_string_parser library class would to parse query following a type of string
*
* @date 2018-03-17
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see Transfert, Query as example
*/
class Query_string_parser extends Parser {

  public function __construct() {
    parent::__construct();
  }

  /**
  * parse method would to parse a query string
  */
  public function parse($query) : bool {
    if (!$this->valid_type($query, 'string'))
      return false;
    // allow explode space format => model method
    // allow explode comma format => model1 method1, model2 method 2
    // allow explode bracket format => [model1, method1] [model2, method2]
    if (count(explode(']', $query)) > 1)
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
}
