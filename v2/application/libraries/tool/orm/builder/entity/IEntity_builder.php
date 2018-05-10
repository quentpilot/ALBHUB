<?php

/**
 *
 */

require_once APPPATH . 'libraries/tool/orm/builder/IORM_builder.php';

interface IEntity_builder extends IORM_builder {

  public function build();

  public function process();

  public function format();

  public function result();
}
