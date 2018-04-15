<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_manager_model extends Items_Manager_Model {

  public function __construct(IDao_manager $dao = null, IFormat_manager $format = null, string $type = null) {
    parent::__construct($dao, $format, $type);
  }
}
