<?php

/**
* Layout class would to be a model of the view to build
* It would create a dynamic and virtual model following rules
* used in each template type
* public and admin templates are able to have their own rules
* to define an order of tags to print
*
* @date 2018-03-14
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see MY_Controller, Render as example
*/

require_once 'IViews.php';

class Layout implements IViews {

  /**
  * config attribute would to be a copy of current CI_Config instance
  */
  protected $config = null;

  /**
  * builder attribute would to be an instance of current layout builder
  * used to template rules and more
  */
  protected $builder = null;

  public function __construct() {
  }

  /**
  * get method would to return class attribute value entered as param
  */
  public function get($property = null) {
    if (is_null($property))
      return false;
    if (property_exists($this, $property))
      return $this->$property;
  }

  /**
  * set method would to set attribute choosen with wanted value
  */
  public function set($property = null, $value = null) {
    if (is_null($property))
      return false;
    if (property_exists($this, $property)) {
      $this->$property = $value;
      return $value;
    }
    return null;
  }
}
