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
* @see Template, Render as example
*/

require_once 'IViews.php';

class Layout implements IViews {

  /**
  * ci attribute would to store current CodeIgniter instance
  */
  protected $ci = null;

  /**
  * config attribute would to be a copy of current CI_Config instance
  */
  protected $config = null;

  /**
  * model attribute would to be an instance of current model class
  * used to get related data for each patrial view
  */
  protected $model = null;

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
  * body attribute would to be the body html part represents as string
  */
  protected $body = null;

  /**
  * renderer attribute would be the subviews content html parts built
  * a dynamic array representing each partial view
  */
  protected $renderer = null;

  /**
  * constructor which would to set main Layout attributes
  */
  public function __construct(Template $template = null, Render $render = null) {
    $this->ci = &get_instance();
    $this->config = $this->ci->config;
    $this->template = $template;
    $this->render = $render;
    $this->renderer = array();
  }

  /**
  * build method would to build each partial view from parts/ repository
  *
  * @see Render::build_view()
  */
  public function build() {
    $this->path = $this->template->get('type').'/'.$this->template->get('name').'/parts/';
    $this->model = $this->new_model();
    $parts = $this->get_printable_parts();
    $output = "";
    $body_content = array();
    $data = array();

    // build each body partial views
    foreach ($parts as $part) {
      if ($part != 'body') {
        // select data to use for each part
        $data[$part] = $this->get_data($part);
        if ($this->render->get('load_parser'))
          $output = $this->ci->parser->parse($this->path.$part, $data[$part], true);
        else
          $output = $this->ci->load->view($this->path.$part, $data[$part], true);
        // head is not a part of body view
        if ($part != 'head')
          $body_content[$part.'_content'] = $output;
        // store final partial view to a dynamic array
        $this->renderer[$part] = $output;
      }
    }
    $this->head = $this->renderer['head'];

    // build body view which is the dynamic partial view asked by controller
    $body_content = array_merge($body_content, $this->get_data('body'));
    if ($this->render->get('load_parser')) {
      $body_content['body_content'] = $this->build_content('parser');
      $this->body = $this->ci->parser->parse($this->path.'body', $body_content, true);
    } else {
      $body_content['body_content'] = $this->build_content();
      $this->body = $this->ci->load->view($this->path.'body', $body_content, true);
    }
    return $this->is_built();
  }

  /**
  * build_content method would to build one or several view files asked from controller
  * to body content when call the Render::render() method
  *
  * TODO : create classes protocol to manage engine/data for each view to avoid useless condidion codes
  * @see Layout::build()
  */
  protected function build_content($engine = 'loader') {
    $path = $this->render->get('path').'/';
    $data = $this->get_data('body');
    $views = $this->render->get('view');
    $output = null;

    foreach ($views as $view) {
      if ($engine == 'loader')
        $output .= $this->ci->load->view($path.$view, $data, true);
      elseif ($engine == 'parser')
        $output .= $this->ci->parser->parse($path.$view, $data, true);
    }
    return $output;
  }

  /**
  * new_model method creates a new instance of the current template model class.
  * for each template a class is mandatory
  *
  * @see Layout::build()
  */
  protected function new_model() {
    $instance = null;
    $base_name = 'Template_model';
    $suffix = '_template_model';
    $name = $this->template->get('name');
    $class_name = null;
    if ($name == null)
      $class_name = $base_name;
    else {
      $preffix = str_replace('-', '', $name);
      $preffix = strtolower($preffix);
      $class_name = $preffix.$suffix;
    }
    $this->ci->load->model('template/Template_model');
    $this->ci->load->model('template/'.$class_name);
    $class_name = ucfirst($class_name);
    $instance = new $class_name($this->template, $this->render);
    return $instance;
  }

  /**
  * get_data method would to get current partial view data to transfert from model
  *
  * @see Layout::build()
  */
  protected function get_data($part = null) {
    $tpl_type = $this->template->get('type');
    $data = array();
    $data = $this->model->get_partial($part, $tpl_type);
    return $data;
  }

  /**
  * get_printable_parts method would to get all partial view filename from config file (templates.php)
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
  * is_built method is the final to check if each partial view has been create
  */
  public function is_built() {
    if (!$this->template instanceof Template || !$this->render instanceof Render || !$this->model instanceof Template_model)
      return false;
      $render = $this->renderer;
      if (is_null($this->head) || is_null($this->body) || is_null($render))
        return false;
      foreach ($render as $key => $value) {
        if (empty($value) || !is_string($value))
          return false;
      }
    return true;
  }

  /**
  * echo methods would help to print the wanted partial view into the layout.php file
  *
  * @see layout.php view file
  */
  public function echo($part = null) {
    if (!$this->is_built())
      return false;
    $printable_parts = $this->get_printable_parts();
    if (property_exists($this, $part) && in_array($part, $printable_parts))
      echo $this->$part;
    else
      echo $this->renderer[$part];
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
