<?php

require_once APPPATH . 'libraries/item/Item.php';

class Page extends Item {

  protected $nav_menu = null;

  protected $side_menu = null;

  protected $articles = null;

  public function __construct(int $id = 0, string $title = null, string $subtitle = null, string $slug = null, $published = "NOW()", $edited = "NOW()", int $user_id = 0, int $ilp_id = 0, int $status_id = 0, Menu $nav_menu = null, Menu $side_menu = null, Article $article = null) {
    parent::__construct($id, $title, $subtitle, $slug, $published, $edited, $user_id, $ilp_id, $status_id);
    $this->nav_menu = $nav_menu;
    $this->side_menu = $side_menu;
    $this->articles = $article;
  }
}
