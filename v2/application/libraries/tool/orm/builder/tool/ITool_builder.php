<?php

/**
 *
 */

require_once APPPATH . 'libraries/tool/orm/builder/IORM_builder.php';

interface ITool_builder extends IORM_builder {

  public function process();

  public function format();

  public function result();
}
