<?php

require_once APPPATH . 'libraries/transfert/ITransfert.php';

interface IProtocol extends ITransfert {

  public function set_rules($rules = null);
}
