<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/manager/IManager_model.php';

class Manager_model extends MY_Manager_Model implements IManager_model {

  public function __construct(string $datatable = null, string $classname = null, $id = 0, $delim = '_', $it = null, IDatatable_builder $table_builder = null, IORM_entity $entity = null, IORM_query $query = null, IORM_result $result = null, string $type = null, IDao_manager $dao = null, IFormat_manager $format = null, IForm_manager $form = null) {
    parent::__construct($datatable, $classname, $id, $delim, $it, $table_builder, $entity, $query, $result, $type, $dao, $format, $form);
    $this->datatable = is_null($this->setting) ? null : $this->setting->get('item_prefix') . $this->delim . $this->setting->get('item_datatable');
    $this->prefix = is_null($this->setting) ? null : $this->setting->get('item_prefix');
    $this->delim = is_null($this->setting) ? $this->delim : $this->setting->get('delim');
    $this->tablename = is_null($this->datatable) ? null : explode($this->delim, $this->datatable)[1];
    if (!empty($this->setting))
      $this->setting->type = $this->type;
  }

  public function nav_menu(Items_manager_setting $configs = null) {
    $this->set_configs($configs);
    $tools = array('dao', 'format');
    $types = array('nav_menu', 'nav_menu');
    $this->setting->set_nav_menu();
    $this->tools($tools,  $types);
    return $this->result;
  }

  public function list(Items_manager_setting $configs = null) {
    $this->set_configs($configs);
    $this->setting->set_table();

    $tools = array('dao', 'format', 'dao', 'format', 'form', 'table');
    $types = array('table', 'table', 'pagination', 'pagination', 'table', 'table');

    $tb_from = $this->setting->get_item('tb_from');
    $tb_where = $this->setting->get_item('tb_where');
    $tb_limit = $this->setting->get_item('tb_limit');
    $tb_order_by = $this->setting->get_item('tb_order_by');

    $entity = $this->entity()->factory();
    $list = $entity->find($tb_where, $tb_from, $tb_limit, $tb_order_by);
    $list[0]->cache();
    //debug($list[0]);
    //debug($list[0]->cache(false));
    $this->setting->add('model.list', $list);
    $this->result = $entity;

    $this->tools($tools, $types);
    $datatable = $this->setting->get_item('table.table');
    $this->result = $datatable;
    return $this->result;
  }

  public function pagination(Items_manager_setting $configs = null) {
    $this->set_configs($configs);
    $tools = array('dao', 'format');
    $types = array('pagination', 'pagination');
    $this->tools($tools, $types);
    return $this->result;
  }

  public function form_new(Items_manager_setting $configs = null) {
    $this->set_configs($configs);
    $tools = array('dao', 'format');
    $types = array('pagination', 'pagination');
    $this->tools($tools, $types);
    return $this->result;
  }

  public function form_edit(Items_manager_setting $configs = null) {
    $this->set_configs($configs);
    $tools = array('dao', 'format');
    $types = array('pagination', 'pagination');
    $this->tools($tools, $types);
    return $this->result;
  }

  public function form_config(Items_manager_setting $configs = null) {
    $this->set_configs($configs);
    $tools = array('dao', 'format');
    $types = array('table', 'table');
    $this->setting->set_form_config();
    $this->tools($tools, $types);
    return $this->result['format.table'];
  }

  public function settings_menu($config = null) {
    if (is_null($config)) return false;
  }

  public function save_button($config = null) {
    if (is_null($config)) return false;
  }

  public function cancel_button($config = null) {
    if (is_null($config)) return false;
  }

  public function back_button($config = null) {
    if (is_null($config)) return false;
  }

  public function item_button($config = null) {
    if (is_null($config)) return false;
  }

  public function _button($config = null) {
    if (is_null($config)) return false;
  }
}