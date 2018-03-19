<?php

require_once APPPATH . 'libraries/transfert/ITransfert.php';

interface IParser extends ITransfert {

  public function parse($query);
  public function valid_type($query, string $type = null);
  public function valid_instance($query, string $instance = 'Parser');
}
