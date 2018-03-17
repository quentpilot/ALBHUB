<?php

require_once APPPATH . 'libraries/transfert/Transfert.php';

/**
* Req library class is a child of Transfert class
* Goal is to format transfert actions classes through controller and model
*
* use Req to transfert request from controller to model
*
* @date 2018-03-17
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see MY_Controller as example
*/
class Req extends Transfert {

  public function __construct($query = null, $data = null, $type = null, $protocol = null) {
    parent::__construct($query, $data, $type, $protocol);
  }
}
