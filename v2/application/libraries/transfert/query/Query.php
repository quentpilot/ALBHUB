<?php

require_once APPPATH . 'libraries/transfert/ITransfert.php';

/**
* Query library class would to parse query type (string, array, object)
* entered when call MY_Controller::request() method to load models, if needed,
* and launch related request
*
* Query class only run, store and check values parsed by his related parser class
*
* You can call different models and methods in only one request
* then define wich result format you want helped by Protocol class
*
* @date 2018-03-17
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see Transfert, Query_parser as example
*/
class Query implements ITransfert {

  protected $parser = null;

  protected $error = null;

  public function __construct($query = null) {
    $this->parser = new Query_parser($query);
  }

  public function parse($query = null) {
    return $this->parser->parse($query);
  }

  public function is_parsed() {
    if (!is_null($this->parser->get('commands')))
      return true;
    return false;
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
