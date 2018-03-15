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
  * ci attribute would to store current CodeIgniter instance
  * used to config Render class
  */
  protected $ci = null;

  /**
  * config attribute would to be a copy of current CI_Config instance
  */
  protected $config = null;

  /**
  * builder attribute would to be an instance of current layout builder
  * used to template rules and more
  */
  protected $builder = null;

  protected $template = null;

  protected $path = null;

  protected $head = null;

  protected $nav_menu = null;

  protected $side_menu = null;

  protected $body = null;

  protected $renderer = null;

  protected $foot = null;

  public function __construct(Template $template = null) {
    $this->ci = &get_instance();
    $this->config = $this->ci->config;
    $this->template = $template;
  }

  public function build() {
    $this->path = $this->template->get('type').'/parts/';
    $parts = $this->get_printable_parts();
    $output = "";

    foreach ($parts as $part) {
      if (property_exists($this, $part)) {
        $data = array('renderer' => $this->renderer);
        $output = $this->ci->load->view($this->path.$part, $data, true);
        $this->$part = $output;
      }
    }
    return $this->is_built();
  }

  public function echo($part = null) {
    if (!$this->is_built())
      return false;
    $printable_parts = $this->get_printable_parts();
    if (property_exists($this, $part) && in_array($part, $printable_parts)) {
      echo $this->$part;
    } else {
      echo "";
    }
  }

  protected function get_printable_parts() {
    if ($this->template->get('type') == 'admin')
      $printable_parts = $this->config->item('layout_admin_parts');
    else
      $printable_parts = $this->config->item('layout_public_parts');
    return $printable_parts;
  }

  public function is_built() {
    if (!$this->template instanceof Template)
      return false;
      $parts = $this->get_printable_parts();

    foreach ($parts as $part) {
      if (!property_exists($this, $part))
        return false;
      if (is_null($this->$part) || !is_string($this->$part))
        return false;
    }
    return true;
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
