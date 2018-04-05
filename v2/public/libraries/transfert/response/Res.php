<?php

require_once APPPATH . 'libraries/transfert/Transfert.php';

/**
* Res library class is a child of Transfert class
* Goal is to format transfert actions classes through controller and model
*
* use Res to transfert response from model to controller
*
* @date 2018-03-17
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see MY_Model as example
*/
class Res extends Transfert {

  public function __construct($query = null, $data = null, $type = null, $protocol = null) {
    parent::__construct($query, $data, $type, $protocol);
  }
}
