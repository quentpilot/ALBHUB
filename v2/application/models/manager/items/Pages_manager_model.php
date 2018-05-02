<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_manager_model extends Items_Manager_Model {

  public function __construct(string $datatable = null, string $classname = null, $id = 0, $delim = '_', $it = null, IDatatable_builder $table_builder = null, IORM_entity $entity = null, IORM_query $query = null, IORM_result $result = null, string $type = null, IDao_manager $dao = null, IFormat_manager $format = null, IForm_manager $form = null) {
    parent::__construct($datatable, $classname, $id, $delim, $it, $table_builder, $entity, $query, $result, $type, $dao, $format, $form);
  }
}
