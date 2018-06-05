<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Pwtpl_template_model class would to get data to insert through related partial view called
*
* @date 2018-03-16
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see Layout as example
*/

class Admalbi_template_model extends Template_model {

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
      //'css_files' => $this->template->load_css(),
      //'ttf_files' => $this->template->load_fonts()
    );
    //$data = array_merge($data, (array)$this->render->get('data')['pages_model_get_page']);
    return $data;
  }

  /**
  * _get_body method would to build body data
  */
  protected function _get_body() {
    $data = array(
      'assets_url' => $this->_asset_path(),
      'site_url' => site_url(),
      //'js_files' => $this->template->load_js()
    );
    //print_r($this->render->get('data')[0]);
    $data = array_merge($data, (array)$this->render->get('data'));
    return $data;
  }

  /**
  * _get_nav_menu method would to build navigation menu data
  */
  protected function _get_nav_menu() {
    $data = array(
      'assets_url' => $this->_asset_path(),
      'site_url' => site_url(),
    );
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
    $data = array(
      'assets_url' => $this->_asset_path(),
      'site_url' => site_url(),
    );
    $data = array_merge($data, $this->user_model->get_user(get_instance()->session->userdata('username')));
    return $data;
  }

  protected function _get_page_bar() {
    $views_data = $this->render->get('data');
    $page_data = (isset($views_data['page_bar']) && !is_null($views_data['page_bar'])) ? $views_data['page_bar'] : array();

    $entity = isset($views_data['entity']) ? $views_data['entity'] : NULL;
    $title = is_null($entity)
              ? (isset($page_data) && isset($page_data['title']))
                ? $page_data['title']
                : $this->uri->segment(count($this->uri->segments)) . ' manager'
              : get_page_bar_title($entity->get('title'));

    $data = array(
      'assets_url' => $this->_asset_path(),
      'site_url' => site_url(),
      'breadcrumb' => explode('>', implode('>', $this->uri->segments)),
      'breadcrumb_url' => array(),
      //'title' => (isset($page_data) && isset($page_data['title'])) ? $page_data['title'] : $this->uri->segment(count($this->uri->segments)) . ' manager',
      //'title' => get_page_bar_title($entity->get('title')),
      'title' => $title,
    );

    return $data;
  }

  /**
  * _get_alert_message method would to build an alert message data
  */
  protected function _get_alert_message() {
    $alert_message = $this->session->flashdata('alert_message');
    if (is_null($alert_message))
      $data = array(
        'alert_message' => ''
      );
    else {
      $data = array(
        'alert_message' => '
          <div class"col-md-8 col-sm-6 col-md-offset-2 col-sm-offset-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              '.$alert_message.'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        '
      );
    }
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
      'assets_url' => $this->_asset_path(),
      //'js_files' => $this->template->load_js()
    );
    return $data;
  }

  /**
  * build path to access through the current asset template repository
  */
  protected function _asset_path() {
    return ($path = base_url() . $this->template->get('path'));
  }
}
