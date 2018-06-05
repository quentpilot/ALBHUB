<?php

interface IDatatable {

  public function config();

  public function build();

  public function prepare();

  public function add_heading();

  public function add_rows();

  public function builder();

  public function view();

  public function set_template();
}
