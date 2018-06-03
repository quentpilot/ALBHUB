<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/manager/table/ITable_manager.php';

class Items_manager_table extends Tools_manager implements ITable_manager {

  protected $view_file = null;

  protected $file_data = null;

  protected $table = null;

  public function __construct(Items_manager_setting $configs = null) {
    parent::__construct($configs);
    $this->view_file = $this->ci->uri->segment(4);
    $this->file_data = array('table_data_table' => array('title' => $this->view_file));
    $this->table = $this->ci->datatable;
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
    $this->set_configs($configs, true);
    $list = $this->configs->get_item('model.list');

    $config = array(
      'head' => $this->configs->get_item('tb_head'),
      'body' => $list,
      'action' => $this->configs->get_item('tb_action'),
      'view' => $this->configs->get_item('tb_view'),
    );

    $this->table->config($config);
    $this->table->build();
    $result['view'] = $this->table->output;

    $this->configs->add('table.table', $result);
    $this->result = $result;
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
