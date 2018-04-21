<?php

/**
 * IORM_builder interface aims to help Orm child classes to build database tables data
 */

require_once APPPATH . 'libraries/tool/orm/builder/IORM_builder.php';

interface ILayout_builder extends IORM_builder {

  public function property();

  public function constructor();

  //public function copy();

  public function output();

}
