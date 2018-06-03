<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/manager/form/IForm_manager.php';

class Items_manager_form extends Tools_manager implements IForm_manager {

  protected $view_file = null;

  protected $file_data = null;

  public function __construct(Items_manager_setting $configs = null) {
    parent::__construct($configs);
    $this->view_file = $this->ci->uri->segment(4);
    $this->file_data = array('table_data_format' => array('title' => $this->view_file));
  }

  public function build() {
    return 'built';
  }

  public function load_nav_menu(Items_manager_setting $configs = null) {
    $this->ci = &get_instance();
    $this->configs = $configs;
    $this->configs->add('form.table', 'table done');
    $this->result = 'nav_menu loaded';
    return true;
  }

  public function load_table(Items_manager_setting $configs = null) {
    $this->ci = &get_instance();
    $this->configs = $configs;
    $this->configs->add('form.table', 'table done');
    $folder = explode('/', $this->ci->get('view')->get('folder'));
    unset($folder[count($folder) - 1]);
    $folder = implode('/', $folder).'/';
    //$this->result = $this->ci->load->view($folder.'list', null, true);
    $this->result = $folder;
    return true;
  }

  public function load_edit(Items_manager_setting $configs = null) {
    $this->ci = &get_instance();
    $this->configs = $configs;
    $this->configs->add('form.edit', 'form done');
    $result['view'] = $this->configs->get_item('model.form_edit');
    $this->result = $result;
    return true;
  }

  public function is_valid(IORM_Database $entity = null, $except = array()) : bool {
    $this->ci = &get_instance();
    $post = $this->ci->input->post();
    $except = count($except) ? $except : array('submit');

    if (is_null($entity))
      return false;

    foreach ($post as $key => $value) {
      if (!in_array($key, $except)) {
        if (is_null($entity->get($key)))
          return false;
      }
    }
    return true;
  }

  public function load_pagination(Items_manager_setting $configs = null) {
    $this->ci = &get_instance();
    $this->configs = $configs;
    $this->configs->add('form.pagin', 'pagination done');
    $this->result = 'pagination formatted';
    return true;
  }

  public function load_form_config(Items_manager_setting $configs = null) {
    $this->ci = &get_instance();
    $this->configs = $configs;
    $this->configs->add('form.form_config', 'form_config done');
    $folder = explode('/', $this->ci->get('view')->get('folder'));
    unset($folder[count($folder) - 1]);
    $folder = implode('/', $folder).'/';
    //$this->result = $this->ci->load->view($folder.'list', null, true);
    $this->result = $folder;
    return true;
  }

  public function set_configs($configs = null, bool $new_ci = false) : bool {
    if ($new_ci)
      $this->ci = &get_instance();
    if (!$configs instanceof Items_manager_setting)
      return false;
    $this->configs = is_null($configs) ? $this->configs : $configs;
    return true;
  }
}
