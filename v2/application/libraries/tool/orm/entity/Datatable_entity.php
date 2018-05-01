<?php

/**
 *
 */

class Datatable_entity extends Table_entity {

  public function __construct(string $tablename = null, $rules = null) {
    parent::__construct($tablename, $rules);
    $this->entity_builder = new Dataentity_builder();
  }
}
