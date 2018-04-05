<?php

require_once APPPATH . 'libraries/transfert/parser/Query_parser_engine.php';

/**
* Query_parser library class would to parse query following his type (string, array, object,...)
*
* It inherits of Query_parser_engine which would defines every query types available
* This is why Query_parser is the final class
*
* @date 2018-03-17
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see Query_parser_engine as example
*/
final class Query_parser extends Query_parser_engine {
  public function __construct($query = null) {
    parent::__construct($query);
  }
}
