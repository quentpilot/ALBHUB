<?php

require_once APPPATH . 'libraries/item/IItem_factory.php';

class Item_factory implements IItem_factory {

  /**
  * ci attribute would be an instance of the current CodeIgniter object
  */
  protected $ci = null;

  /**
  * item_type attribute would be the current classname to create
  */
  protected $item_type = null;

  /**
  * args attributes is an optional parameter to import when create a new instance
  */
  protected $args = null;

  /**
  * iterator attribute would to store the number of instances to create
  */
  protected $iterator = 0;

  /**
  * item attribute would be a single instance of the current item type to create
  */
  protected $item = null;

  /**
  * items attribute is an array of each item instance created
  */
  protected $items = null;

  public function __construct($item_type = null, $args = null, $iteration = 1) {
    $this->ci = &get_instance();
    $this->item_type = $item_type;
    $this->args = $args;
    $this->iterator = $iteration;
  }

  /**
  * new_instance method would to create a Item new instance following related type
  */
  public static function new_instance(string $item_type, $args = null) {
    $instance = null;
    $item_type = ucfirst($item_type);

    if (is_null($item_type))
      return false;
    elseif (!is_null($args) && is_array($args) && count($args)) {
      $instance = new $item_type();
      $instance->feed($args);
    } else {
      $instance = new $item_type();
    }
    return $instance;
  }

  /**
  * build method would to build an array of one or several Item objects following iterator
  */
  public function build() : bool {
    if (is_null($this->item_type))
      return false;
    $object = null;
    $objects = array();
    $type = null;

    if (!($type = $this->get_type()))
      return false;
    for ($it = 0; $it < $this->iterator; $it++) {
      if (!$this->load($type, $this->item_type))
        return false;
      $objects[] = $this->new_instance($this->item_type, $this->args);
    }
    if (count($objects) == 1)
      $object = $objects[0];
    $this->object = $object;
    $this->objects = $objects;
    return true;
  }

  /**
  * get_type would to identify item type from his name to load
  * class if isn't instanciated yet
  */
  protected function get_type() {
    $item_type = strtolower($this->item_type);
    $type = null;
    $t_exploded = explode('_', $item_type);
    $t_allow = array('page', 'article', 'menu', 'widget');

    foreach ($t_exploded as $part) {
      if (in_array($part, $t_allow))
        return $part;
    }
    return false;
  }

  /**
  * load method would to check if an instance of current item type exists
  * and load a newer if not
  */
  public function load($type = null, $classname = null) : bool {
    $this->ci = &get_instance();
    $classname = strtolower($classname);
    $type = strtolower($type);
    $path = "item/$type/$classname";

    if (!isset($this->ci->$classname)) {
      return $this->ci->load->library($path);
    }
    return true;
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
    $this->cat_id = $object->cat_id;
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
