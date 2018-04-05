<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Pwtpl_template_model class would to get data to insert through related partial view called
*
* @date 2018-03-16
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see Layout as example
*/

class Pwtpl_template_model extends Template_model {

  /**
  * constructor set instances needed to build and get filesystem data
  */
  public function __construct($template = null, $render = null) {
    parent::__construct();
    $this->template = $template;
    $this->render = $render;
  }

  /**
  * get_partial method is used to call each partial view data we want to our partial views
  */
  public function get_partial($view = null) {
    $layout_partials = $this->config->item('layout_'.$this->template->get('type').'_parts');
    if (is_array($layout_partials) && in_array($view, $layout_partials)) {
      $part = "_get_$view";
      return $this->$part();
    }
    return null;
  }

  /**
  * _get_head method would to build head data
  */
  protected function _get_head() {
    $data = array(
      'assets_url' => $this->_asset_path(),
      'css_files' => $this->template->load_css(),
      'ttf_files' => $this->template->load_fonts()
    );
    return $data;
  }

  /**
  * _get_body method would to build body data
  */
  protected function _get_body() {
    $data = array(
      'assets_url' => $this->_asset_path(),
      'js_files' => $this->template->load_js()
    );
    $data = array_merge($data, (array)$this->render->get('data'));
    return $data;
  }

  /**
  * _get_nav_menu method would to build navigation menu data
  */
  protected function _get_nav_menu() {
    $data = array();
    $menu_links = array(
      'index' => 'index.html',
      'about' => 'about.html',
      'examples' => 'examples.html',
      'documentation' => 'documentation.html',
      'contact' => 'contact.html'
    );
    $data = array_merge($data, $menu_links);
    return $data;
  }

  /**
  * _get_side_menu method would to build side menu data
  */
  protected function _get_side_menu() {
    $data = array();
    return $data;
  }

  /**
  * _get_info_bar method would to build head info bar data
  */
  protected function _get_info_bar() {
    $data = array();
    return $data;
  }

  /**
  * _get_user_modal method would to build user login modal data
  */
  protected function _get_user_modal() {
    $data = array();
    return $data;
  }

  /**
  * _get_foot method would to build foot data
  */
  protected function _get_foot() {
    $data = array(
      'js_files' => $this->template->load_js()
    );
    return $data;
  }

  /**
  * build path to access through the current asset template repository
  */
  protected function _asset_path() {
    return ($path = base_url() . $this->template->get('path'));
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
