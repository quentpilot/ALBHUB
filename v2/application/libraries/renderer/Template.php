<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Template class would to load selected template used in final Render class
* Choose current template paths like CSS and JS files
* Then structure a layout to use in final view (as admin as client)
*
* @date 2018-03-14
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see Render as example
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
  * ttf_path attribut define the current template sub folder ttf files to load
  * properly scripts include to html page
  */
  protected $ttf_path = null;

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
    $this->ttf_path = $this->path."/fonts";
  }

  /**
  * load_css method would to find and build an array of css files to use for current view
  * except filename in params
  */
  public function load_css($echo = false, $r_string = true) {
    $css = array();
    if (count($this->config->item('tpl_css_files')))
      $files = $this->config->item('tpl_css_files');
    else
      $files = scandir(APPPATH . '../'. $this->css_path);
    //return $files;
    foreach ($files as $file => $name) {
      //echo $name;
      $exploded = explode('.', $name);
      $ext = $exploded[count($exploded) - 1];
      if (!in_array($name, array('.', '..')) && $ext == 'css') {
        if ($echo)
          echo ($css[] = '<link rel="stylesheet" href="'.base_url().$this->css_path.'/'.$name.'">');
        else
          $css[] = '<link rel="stylesheet" href="'.base_url().$this->css_path.'/'.$name.'">';
      }
    }

    if ($r_string) {
      $css = implode(",", $css);
      $css = str_replace(',', '', $css);
    }
    return $css;
  }

  /**
  * load_js method would to find and build an array of js files to use for current view
  * except filename in params
  */
  public function load_js($echo = false, $r_string = true, $except = array()) {
    $js = array();
    if (count($this->config->item('tpl_js_files')))
      $files = $this->config->item('tpl_js_files');
    else
      $files = scandir($this->js_path);

    foreach ($files as $file => $name) {
      $exploded = explode('.', $name);
      $ext = $exploded[count($exploded) - 1];
      if (!in_array($name, array('.', '..')) && !in_array($name, $except) && $ext == 'js') {
        if ($echo)
          echo ($js[] = '<script src="'.base_url().$this->js_path.'/'.$name.'"></script>');
        else
          $js[] = '<script src="'.base_url().$this->js_path.'/'.$name.'"></script>';
      }
    }

    if ($r_string) {
      $js = implode(",", $js);
      $js = str_replace(',', '', $js);
    }
    return $js;
  }

  /**
  * load_font method would to find and build an array of ttf files to use for current view
  * except filename in params
  */
  public function load_fonts($ufiles = array(), $echo = false, $r_string = true, $except = array()) {
    $ttf = array();
    $subdir = $this->config->item('tpl_ttf_files');
    if (count($subdir))
      $this->ttf_path .'/'. implode(',', $subdir);
    $files = scandir($this->ttf_path);

    foreach ($files as $file => $name) {
      $exploded = explode('.', $name);
      if (count($exploded) > 1)
        $ext = $exploded[1];

      if (!in_array($name, array('.', '..')) && !in_array($name, $except) && $ext == 'ttf') {
        if ($echo)
          echo ($ttf[] = '<link rel="stylesheet" type="font/ttf" href="'.base_url().$this->ttf_path.'/'.$name.'">');
        else
          $ttf[] = '<link rel="stylesheet" type="font/ttf" href="'.base_url().$this->ttf_path.'/'.$name.'">';
      }
    }

    if ($r_string) {
      $ttf = implode(",", $ttf);
      $ttf = str_replace(',', '', $ttf);
    }
    return $ttf;
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
