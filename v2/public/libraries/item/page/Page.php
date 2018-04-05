<?php

require_once APPPATH . 'libraries/item/Item.php';

class Page extends Item {

  protected $menu = null;

  protected $articles = null;

    public function __construct(int $id = 0, string $title = null, string $subtitle = null, string $slug = null, $published = "NOW()", $edited = "NOW()", int $user_id = 0, int $cat_id = 0, int $status_id = 0, Menu $menu = null, Article $article = null) {
      parent::__construct($id, $title, $subtitle, $slug, $published, $edited, $user_id, $cat_id, $status_id);
      $this->menu = $menu;
      $this->articles = $article;
  }
}