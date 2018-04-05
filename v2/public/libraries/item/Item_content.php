<?php

require_once APPPATH . 'libraries/item/IItem.php';

class Item_content implements IItem {

  /**
  * item_id attribute is the id value of current item
  */
  protected $item_id = 0;

  /**
  * show_title attribute is the title view action value of current item
  */
  protected $show_title = true;

  /**
  * text_content attribute is the main text value of current item
  */
  protected $text_content = '';

  /**
  * tags attribute is the tags value of current item
  */
  protected $tags = null;

  /**
  * url_name attribute is the name of main url of current item
  */
  protected $url_name = null;

  /**
  * url_link attribute is the hypertext value of main url of current item
  */
  protected $url_link = null;

  /**
  * url_target attribute is the target of the main url of current item
  */
  protected $url_target = '_self';

  /**
  * class_name attribute is the name of current item class
  */
  protected $class_name = null;

  /**
  * class_content attribute is the serialized item class
  */
  protected $class_content = '';

  /**
  * table_name attribute is the name of current table to store item data
  */
  protected $table_name = 'albi_items_content';

  public function __construct(int $item_id = 0, bool $show_title = true, $text_content = '', $tags = null, string $url_name = null, string $url_link = null, string $url_target = '_self', $class_name = null, $class_content = '') {
    $this->item_id = $item_id;
    $this->class_name = $class_name;
    $this->class_content = $class_content;
    $this->text_content = $text_content;
    $this->tags = $tags;
    $this->show_title = $show_title;
    $this->url_name = $url_name;
    $this->url_link = $url_link;
    $this->url_target = $url_target;
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
    $this->item_id = $object->item_id;
    $this->class_name = $object->class_name;
    $this->class_content = $object->class_content;
    $this->text_content = $object->text_content;
    $this->tags = $object->tags;
    $this->show_title = $object->show_title;
    $this->url_name = $object->url_name;
    $this->url_link = $object->url_link;
    $this->url_target = $object->url_target;
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
