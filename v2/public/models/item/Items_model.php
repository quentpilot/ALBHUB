<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items_model extends MY_Model {

  protected $page = null;
  protected $menu = null;
  protected $articles = null;
  protected $widgets = null;

  public function __construct(Item $page = null) {
    parent::__construct();
    $this->page = $page;
  }

  public function run() : bool {
    if (is_null($this->page))
      return null;
    return $this->page;
  }

  protected function process() : bool {
    return false;
  }

  protected function build_item(Item $item) : Item {
    return null;
  }

  protected function build_page() {
    return false;
  }

  protected function build_menu() {
    return false;
  }

  protected function build_articles() {
    return false;
  }

  protected function build_widgets() {
    return false;
  }
}
