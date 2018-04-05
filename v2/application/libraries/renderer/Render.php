<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Render class would to build render view with template type selected
* Some methods would to help constructor to display final client view
*
* @date 2018-03-14
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see MY_Controller as example
*/

require_once 'IViews.php';

class Render implements IViews {

  /**
  * ci attribute would to store current CodeIgniter instance
  */
  protected $ci = null;

  /**
  * config attribute would to be a copy of current CI_Config instance
  */
  protected $config = null;

  /**
  * template attribute would to be an instance of Template library class
  * used to set a layout for view to build
  */
  protected $template = null;

  /**
  * layout attribute would to be an instance of Layout library class used to structure
  * each part of page
  */
  protected $layout = null;

  /**
  * index attribut would to define the main file to load to structure sub views
  * this file contains each main html parts needed to properly load final page
  *
  * @see /application/views/{template_type}/layout.php
  * @see Render::render($view, $data, $return_output, $parser)
  */
  protected $index = null;

  /**
  * folder attribute is the name of sub view folder used to parse and display
  * set attibute from your controller before to call the Render::render() method
  */
  protected $folder = null;

  /**
  * view attribute is the name of sub view file to parse and display
  */
  protected $view = null;

  /**
  * path attribute is the full path of the current template view repository
  */
  protected $path = null;

  /**
  * data attribut is an array of all the dynamic data used through
  * current view file to display
  */
  protected $data = array();

  /**
  * output attribut is the final view built and ready to be print as a string
  */
  protected $output = null;

  /*
  * return_output attribut would to define if the output attribute must be return
  * as string or only display after build it
  */
  protected $return_output = FALSE;

  /**
  * load_parser attribut define if we use the CI_Parser library class for current view
  * or if we use the PHP template engine
  */
  protected $load_parser = TRUE;

  /**
  * constructor to set main attributes
  */
  public function __construct($load_parser = false, $view = null, $data = array(), $return_output = false) {
    $this->ci = &get_instance();
    $this->config = $this->ci->config;
    $this->load_parser = $load_parser;
    $this->index = 'layout';
    $this->view = is_array($view) ? $view : array($view);
    $this->data = (is_array($data) && !count($data)) ?? array('null' => 'yes') ?? $data;
    $this->return_output = $return_output;
  }

  /*
  * render method to set and build view output to load and display what controller wants
  */
  public function render($view = null, $data = array(), $return_output = false, $load_parser = false) {
    // able to load only one or several views
    //$this->view = is_array($view) ? $view : array($view);
    $this->view = $this->set_view($view);
    $this->data = $data;
    $this->return_output = $return_output;
    $this->parser = $load_parser;
    return $this->build_template() ? $this->build_view() : false;
  }

  /**
  * build_template method would to set Render::template attribute
  * following Render::render() methods params
  */
  protected function build_template() {
    // define if current route wants an admin or public template
    $uri_segment = $this->ci->uri->segments;
    $tpl_type = (count($uri_segment) && $uri_segment[1] == 'admin') ? 'admin' : 'public';
    $tpl_name = 'tpl_'.$tpl_type.'_name';

    // set template config file
    if (!$this->set_config($tpl_type, $tpl_name))
      return false;

    // create a new template
    $this->template = new Template($this->config->item($tpl_name), $tpl_type, $this->config->item('tpl_root_path'));

    // build final view path
    $tpl_type = $this->template->get('type');
    $tpl_name = $this->template->get('name');
    $this->path = "$tpl_type/$tpl_name";
    return true;
  }

  /**
  * build_layout method would to make a new layout following template & layout type and rules
  */
  public function build_layout() {
    $this->layout = new Layout($this->template, $this);
    return $this->layout->build();
  }

  /**
  * build_view method would to process the view builder
  * helped by CodeIgniter CI_Loader view library method
  *
  * @return boolean or string defining current view file to load
  */
  protected function build_view() {
    // build partial views
    if (!$this->build_layout())
      return false;

    // set final values for layout view file
    $content = array(
      'response' => $this->data,
      'template' => $this->template,
      'layout' => $this->layout,
    );

    // then build full html view with current view as data content
    // and return true or return a string representing a full html page requested by client (HTTP request/response protocol)
    // following return_output value
    // note that for the layout file which use objects, CI_Parser couldn't be used
    if ($this->return_output) {
      return ($this->output = $this->ci->load->view($this->path.'/'.$this->index, $content, true));
    } else {
      $this->output = $this->ci->load->view($this->path.'/'.$this->index, $content);
      return true;
    }
  }

  protected function build_views() {
    // build template
    if (!$this->build_template())
      return false;

    // store and reset views to not having string conversion conflict in build_view() method
    $views = $this->view;
    $this->view = null;

    // store output status we finally want
    $return_output = $this->return_output;

    // reset temporary global result_output to return a string for each view built
    $this->return_output = true;
    $output = "";

    // loop to concatenate each view output as string
    foreach ($views as $view) {
      $this->view = $view;
      $output .= $this->build_view();
    }

    // then reset attributes
    $this->view = $views;
    $this->output = $output;
    $this->return_output = $return_output;

    // finally print or return output
    if ($this->return_output)
      return $this->output;
    echo $this->output;
    return true;
  }

  /**
  * set_config method would to select the current template config file to load
  */
  protected function set_config($tpl_type = null, $tpl_name = null) {
    $t_name = $this->config->item($tpl_name);
    $t_type = $tpl_type;
    $file_path = "../views/$t_type/$t_name/config/template";
    $this->ci->config->load($file_path);
    $this->config = $this->ci->config;
    return true;
  }

  public function set_view($view = null) {
    $view = is_array($view) ? $view : array($view);
    $path = '';
    $views = array();
    if (!is_null($this->folder))
      $path = $this->folder . '/';
    foreach ($view as $file) {
      $views[] = $path.$file;
    }
    return $views;
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
