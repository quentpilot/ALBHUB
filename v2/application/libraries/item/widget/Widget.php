<?php

require_once APPPATH . 'libraries/item/Item.php';

class Widget extends Item {
    public function __construct(int $id = 0, string $title = null, string $subtitle = null, string $slug = null, $published = "NOW()", $edited = "NOW()", int $user_id = 0, int $cat_id = 0, int $status_id = 0) {
      parent::__construct($id, $title, $subtitle, $slug, $published, $edited, $user_id, $cat_id, $status_id);
  }
}
