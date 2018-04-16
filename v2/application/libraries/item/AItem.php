<?php

require_once APPPATH . 'libraries/item/IItem.php';

abstract class AItem implements IItem {

  /**
  * id attribute is the id value of current item
  */
  protected $id = 0;

  /**
  * title attribute is the title value of current item
  */
  protected $title = null;

  /**
  * subtitle attribute is the subtitle value of current item
  */
  protected $subtitle = null;

  /**
  * slug attribute is the slug value of current item
  */
  protected $slug = null;

  /**
  * plublished attribute is the plublish date value of current item
  */
  protected $published = "NOW()";

  /**
  * edited attribute is the edit data value of current item
  */
  protected $edited = "NOW()";

  /**
  * table_content attribute is the name of related advanced content table value of current item
  */
  protected $table_content = "itc_items_content";

  /**
  * user_id attribute is the id value of current user who created this item
  */
  protected $user_id = 0;

  /**
  * ilp_id attribute is the id value of current item category
  */
  protected $ilp_id = 0;

  /**
  * status_id attribute is the id value of current item status
  */
  protected $status_id = 0;

  public function __construct(int $id = 0, string $title = null, string $subtitle = null, string $slug = null, $published = "NOW()", $edited = "NOW()", int $user_id = 0, int $ilp_id = 0, int $status_id = 0) {
    $this->id = $id;
    $this->title = $title;
    $this->subtitle = $subtitle;
    $this->slug = $slug;
    $this->published = $published;
    $this->edited = $edited;
    $this->user_id = $user_id;
    $this->ilp_id = $ilp_id;
    $this->status_id = $status_id;
  }

  /**
  * feed method would to set each attribute associated array to current class
  */
  public function feed(array $attribute) : bool {
    foreach ($attributes as $key => $value) {
      if (!$this->set($key, $value))
        return false;
    }
    return true;
  }

  /**
  * copy method would to set each class attribute from object as parameter
  */
  public function copy(Item $object) : bool {
    $this->id = $object->id;
    $this->title = $object->title;
    $this->subtitle = $object->subtitle;
    $this->slug = $object->slug;
    $this->published = $object->published;
    $this->edited = $object->edited;
    $this->user_id = $object->user_id;
    $this->ilp_id = $object->ilp_id;
    $this->status_id = $object->status_id;
    return true;
  }

  /**
  * get method would to return class attribute value entered as param
  */
  public function get($property) {
    if (is_null($property))
      return false;
    if (property_exists($this, $property))
      return $this->$property;
  }

  /**
  * set method would to set attribute choosen with wanted value
  */
  public function set($property, $value = null) {
    if (is_null($property))
      return false;
    if (property_exists($this, $property)) {
      $this->$property = $value;
      return $value;
    }
    return null;
  }
}
