<?php

interface IFormulary {

  public function config();

  public function build();

  public function prepare();

  public function input();

  public function validation();

  public function fields();

  public function builder();

  public function view();

  public function set_template();
}
