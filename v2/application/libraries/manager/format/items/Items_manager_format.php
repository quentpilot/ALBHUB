<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/manager/format/IFormat_manager.php';

class Items_manager_format extends Tools_manager implements IFormat_manager {

  protected $view_file = null;

  protected $file_data = null;

  public function __construct(Items_manager_setting $configs = null) {
    parent::__construct($configs);
    $this->view_file = $this->ci->uri->segment(4);
    $this->file_data = array('table_data_format' => array('title' => $this->view_file));
  }

  public function format() {
    return 'formated';
  }

  public function load_nav_menu(Items_manager_setting $configs = null) {
    $this->ci = &get_instance();
    $this->configs = $configs;
    $this->configs->add('format.table', 'table done');
    $this->result = 'nav_menu loaded';
    return true;
  }

  public function load_table(Items_manager_setting $configs = null) {
    $this->ci = &get_instance();
    $this->configs = $configs;
    $this->configs->add('format.table', 'table done');
    $folder = explode('/', $this->ci->get('view')->get('folder'));
    unset($folder[count($folder) - 1]);
    $folder = implode('/', $folder).'/';
    //$this->result = $this->ci->load->view($folder.'list', null, true);
    $this->result = $folder;
    return true;
  }

  public function load_pagination(Items_manager_setting $configs = null) {
    $this->ci = &get_instance();
    $this->configs = $configs;
    $this->configs->add('format.pagin', 'pagination done');
    $this->result = 'pagination formatted';
    return true;
  }

  public function load_form_config(Items_manager_setting $configs = null) {
    $this->ci = &get_instance();
    $this->configs = $configs;
    $this->configs->add('format.form_config', 'form_config done');
    $folder = explode('/', $this->ci->get('view')->get('folder'));
    unset($folder[count($folder) - 1]);
    $folder = implode('/', $folder).'/';
    //$this->result = $this->ci->load->view($folder.'list', null, true);
    $this->result = $folder;
    return true;
  }
}
