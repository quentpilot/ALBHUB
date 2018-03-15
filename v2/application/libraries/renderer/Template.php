<?php

/**
* Template class would to load selected template used in final Render class
* Choose current template paths like CSS and JS files
* Then structure a layout to use in final view (as admin as client)
*
* @date 2018-03-14
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see MY_Controller, Render as example
*/

require_once 'IViews.php';

class Template implements IViews {

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
  * name attribute would to be the current template repository name to use
  * from /assets/templates path
  */
  protected $name = null;

  /**
  * type attribute is the part type of template to use (public or admin)
  */
  protected $type = null;

  /**
  * root_path attribute define the main path where every templates are stored
  * through filesystem
  */
  protected $root_path = null;

  /**
  * path attribut is the final template path to locate it easily
  */
  protected $path = null;

  /**
  * css_path attribut define the current template sub folder css files to load
  * properly style include to html page
  */
  protected $css_path = null;

  /**
  * css_path attribut define the current template sub folder css files to load
  * properly scripts include to html page
  */
  protected $js_path = null;

  /**
  * constructor to set main attributes
  */
  public function __construct($name = null, $type = 'public', $path = 'assets/templates') {
    $this->config = &get_instance()->config;
    $this->name = $name;
    $this->type = $type;
    $this->root_path = $path;
    $this->path = "$path/$type/$name";
    $this->css_path = $this->path."/css";
    $this->js_path = $this->path."/js";
  }

  /**
  * load_css method would to find and build an array of css files to use for current view
  * except filename in params
  */
  public function load_css($except = array()) {
    $css = array();
    $path = APPPATH . '../'.$this->css_path;
    $files = scandir($path);
    foreach ($files as $file) {
      $css[] = '<link rel="stylesheet" href="'.$path.'/'.$file.'">';
    }
    return $css;
  }

  /**
  * load_css method would to find and build an array of js files to use for current view
  * except filename in params
  */
  public function load_js($except = array()) {
    $js = array();
    $path = APPPATH . '../'.$this->css_path;
    $files = scandir($path);

    foreach ($files as $file) {
      $js[] = '<script src="'.$path.'/'.$file.'"></script>';
    }
    return $js;
  }

  /**
  * get method would to return class attribute value entered as param
  */
  public function get($property = null) {
    if (is_null($property))
      return false;
    if (property_exists($this, $property))
      return $this->$property;
    return false;
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
