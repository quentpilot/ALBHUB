<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
  * builder attribute would to be an instance of current layout builder class
  * used to template rules and more
  */
  protected $builder = null;

  /**
  * template attribute would to be an instance of current template class
  * used to manage paths
  */
  protected $template = null;

  /**
  * render attribute would to be an instance of current render class
  * used to load views
  */
  protected $render = null;

  /**
  * path attribute is the path of the filesystem view parts repository
  */
  protected $path = null;

  /**
  * head attribute would to be the head html part represents as string
  */
  protected $head = null;

  /**
  * nav_menu attribute would to be the main menu navigation html part represents as string
  */
  protected $nav_menu = null;

  /**
  * side_menu attribute would to be the menu side html part represents as string
  */
  protected $side_menu = null;

  /**
  * body attribute would to be the body html part represents as string
  */
  protected $body = null;

  /**
  * renderer attribute would to be the subview dynamic content html part represents as string
  */
  protected $renderer = null;

  /**
  * foot attribute would to be the foot html part represents as string
  */
  protected $foot = null;

  /**
  * constructor which would to set main Layout attributes
  */
  public function __construct(Template $template = null, Render $render = null) {
    $this->ci = &get_instance();
    $this->config = $this->ci->config;
    $this->template = $template;
    $this->render = $render;
  }

  /**
  * build() method would to build each partial view from parts/ repository
  */
  public function build() {
    $this->path = $this->template->get('type').'/parts/';
    $parts = $this->get_printable_parts();
    $output = "";
    $body_content = array();

    $body_content['js_files'] = $this->template->load_js();
    $body_content['assets_url'] = base_url() . $this->template->get('path');
    foreach ($parts as $part) {
      if (property_exists($this, $part) && $part != 'body') {
        // select data to use for each part
        $part_data = ucfirst($part);
        if ($part == 'head')
          $data = array('assets_url' => $body_content['assets_url'], 'css_files' => $this->template->load_css(), 'ttf_files' => $this->template->load_fonts());
        else
          $data = array($part.'_content' => $part_data);
        if ($this->render->get('load_parser'))
          $output = $this->ci->parser->parse($this->path.$part, $data, true);
        else
          $output = $this->ci->load->view($this->path.$part, $data, true);
        if ($part != 'head')
          $body_content[$part.'_content'] = $output;
        $this->$part = $output;
      }
    }

    /*$render_data = $this->render->get('data');
    $view_content['assets_url'] = base_url() . $this->template->get('path');
    if (is_null($render_data))
      $render_data = array($view_content);
    else
        $render_data = array_combine($this->render->get('data'), $view_content);*/

    //$this->render->set('data', $render_data);

    // build body view
    if ($this->render->get('load_parser')) {
      $body_content['body_content'] = $this->ci->parser->parse($this->template->get('type').'/'.$this->render->get('view'), array('assets_url' => $body_content['assets_url'], $this->render->get('data')), true);
      $this->body = $this->ci->parser->parse($this->path.'body', $body_content, true);
    } else {
      $body_content['body_content'] = $this->ci->load->view($this->template->get('type').'/'.$this->render->get('view'), array('assets_url' => $body_content['assets_url'], $this->render->get('data')), true);
      $this->body = $this->ci->load->view($this->path.'body', $body_content, true);
    }

    return $this->is_built();
  }

  public function build_() {
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

  /**
  * echo() methods would help to print the wanted partial view into the layout.php file
  */
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

  /**
  * get_printable_parts() method would to get all partial view filename from config file (templates.php)
  * following template type to use
  */
  protected function get_printable_parts() {
    if ($this->template->get('type') == 'admin')
      $printable_parts = $this->config->item('layout_admin_parts');
    else
      $printable_parts = $this->config->item('layout_public_parts');
    return $printable_parts;
  }

  /**
  * is_built() method is the final to check if each partial view has been create
  */
  public function is_built() {
    if (!$this->template instanceof Template || !$this->render instanceof Render)
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
