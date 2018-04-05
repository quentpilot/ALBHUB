<?php

/**
* transfers.php config file would to store default data used to transfert library
*
* @date 2018-03-17
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see Transfert, Query_parser as example
*/

$config['transfert_protocol'] = array(
  // related to Parser library
  'parser' => array(
    // define which children Parser class for query type are allowed
    'types' => array('string', 'array', 'object')
  ),
  // related to Rules library class to define each attribute
  'rules' => array(),
  // related to Validation library class to define which transfert types may be checked
  'validation' => array('request', 'response')
);
