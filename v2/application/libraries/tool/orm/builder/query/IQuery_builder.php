<?php

/**
 *
 */

require_once APPPATH . 'libraries/tool/orm/builder/IORM_builder.php';

interface IQuery_builder extends IORM_builder {

  public function query();

  public function result();

  public function process();

  public function format();

  public function concat();
}
