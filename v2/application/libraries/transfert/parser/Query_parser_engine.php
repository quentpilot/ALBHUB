<?php

require_once APPPATH . 'libraries/transfert/parser/Parser.php';

/**
* Query_parser_engine library class would to parse query following his type (string, array, object,...)
*
* It uses children class to explode query and store each model name and related method to load and launch them by Transfert class
*
* @date 2018-03-17
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see Transfert, Query, Parser as example
*/
abstract class Query_parser_engine extends Parser {

  /**
  * string_parser attribute would to store an instance of Query_string_parser class
  */
  protected $string_parser = null;

  /**
  * array_parser attribute would to store an instance of Query_array_parser class
  */
  protected $array_parser = null;

  /**
  * object_parser attribute would to store an instance of Query_object_parser class
  */
  protected $object_parser = null;

  public function __construct($query = null) {
    parent::__construct();
    $this->parse($query);
  }

  /**
  * parse method would to parse current query following his type
  */
  public function parse($query) : bool {
    if (!$this->valid_type($query))
      return false;
    $this->clear();
    if (is_null($query)) {
      $this->error = "is_null";
      return false;
    }
    return $this->build($query);
  }

  /**
  * build method would to call a parsing method following query type
  */
  protected function build($query) {
    $type = gettype($query);
    $method = 'parse_'.$type;
    if (!$this->load_parsers())
      return false;
    if (method_exists($this, $method)) {
      return $this->$method($query);
    } else {
      $this->error = array("bad_type" => "method parser type (Query_parser::$method) not found");
      return false;
    }
  }

  /**
  * load_parsers would to load and set each available parser type to a Query_parser attribute
  */
  protected function load_parsers() {
    $parsers = $this->config->item('transfert_protocol')['parser']['types'];
    $preffix = 'query_';
    $suffix = '_parser';
    $path_root = 'transfert/parser/';
    $classname = null;
    $ci = &get_instance();

    foreach ($parsers as $parser) {
        $classname = $preffix.$parser.$suffix;
        $path = $path_root.$classname;
        $attribute = $parser.$suffix;
        if (!$ci->load->library($path) || !property_exists($this, $attribute))
          return false;
        $this->$attribute = $ci->$classname;
    }
    return true;
  }

  /**
  * parse_string method would to parse a query string
  */
  protected function parse_string(string $query) : bool {
    if ($this->string_parser->parse($query))
      return $this->copy_parser($this->string_parser);
    return false;
  }

  /**
  * parse_string method would to parse a query array
  */
  protected function parse_array(array $query) : bool {
    if ($this->array_parser->parse($query))
      return $this->copy_parser($this->array_parser);
    return false;
  }

  /**
  * parse_string method would to parse a query object
  */
  protected function parse_object(object $query) : bool {
    if ($this->object_parser->parse($query))
      return $this->copy_parser($this->object_parser);
    return false;
  }

  /**
  * copy_parser would to copy each needed Parser class attribute to Query_parser once built
  */
  protected function copy_parser(Parser $parser) : bool {
    $this->model = $parser->get('model');
    $this->method = $parser->get('method');
    $this->commands = $parser->get('commands');
    return true;
  }
}
