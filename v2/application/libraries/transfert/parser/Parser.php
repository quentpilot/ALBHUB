<?php

require_once APPPATH . 'libraries/transfert/parser/IParser.php';

/**
* Parser abstract library class would to be a model for each sub parser class
* needed by Query_parser to copy parsed query results
*
* @date 2018-03-19
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see Query_parser as example
*/
abstract class Parser implements IParser {

  /**
  * config attribute would to be an instance of the current CI_Config object
  */
  protected $config = null;

  /**
  * model attribute would to store one or several models class name to load
  */
  protected $model = null;

  /**
  * method attribute would to store one or several methods name to call
  */
  protected $method = null;

  /**
  * commands attribute would to store an associating array of model(s) and method(s) validated by parser
  */
  protected $commands = null;

  /**
  * error attribute store error messages if parser failed
  */
  protected $error = null;

  public function __construct() {
    $this->config = &get_instance()->config;
  }

  /**
  * parse method would to process to parse the current query.
  * children class would to parse a query following a specific type
  */
  public function parse($query) : bool {
    if (!$this->valid_type($query))
      return false;
    $this->commands = $query;
    return true;
  }

  /**
  * valid_type method would to check if current query type is valid for current child Parser class.
  * usually call valid_type() as first instruction in parse() method.
  *
  * because of IParser::valid_type() prototype which allow every type of query, valid_type() method has been created
  */
  public function valid_type($query, string $type = null) {
    $type = (is_null($type)) ? gettype($query) : $type;
    $types = $this->config->item('transfert_protocol')['parser']['types'];
    return in_array($type, $types);
  }

  /**
  * valid_instance method would to check if current query is an instance of the wanted object name
  * usually call valid_instance() as first instruction in parse() method to check object type
  */
  public function valid_instance($query, string $instance = 'Parser') {
    return ($query instanceof $instance) ? true : false;
  }

  /**
  * clear method would to reset each class attribute
  */
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
