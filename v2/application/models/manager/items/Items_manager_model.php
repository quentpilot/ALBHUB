<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/manager/IManager_model.php';

class Items_manager_model extends MY_Manager_Model implements IManager_model {

  public function __construct(string $datatable = null, string $classname = null, $id = 0, $delim = '_', $it = null, IDatatable_builder $table_builder = null, IEntity_builder $entity_builder = null, IORM_query $query = null, IORM_result $result = null, string $type = null, IDao_manager $dao = null, IFormat_manager $format = null, IForm_manager $form = null) {
    parent::__construct($datatable, $classname, $id, $delim, $it, $table_builder, $entity_builder, $query, $result, $type, $dao, $format, $form);
    $this->datatable = is_null($this->setting) ? null : $this->setting->get('item_prefix') . $this->delim . $this->setting->get('item_datatable');
    $this->prefix = is_null($this->setting) ? null : $this->setting->get('item_prefix');
    $this->delim = is_null($this->setting) ? $this->delim : $this->setting->get('delim');
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
    $tools = array('dao', 'format', 'dao', 'format', 'form');
    $types = array('table', 'table', 'pagination', 'pagination', 'table');
    $this->setting->set_table();
    $item = $this->db->select()->from($this->datatable)->where($this->prefix.$this->delim.'ilp_id', 1)->limit(10)->get();
    $list = $item->result_array();
    /*$this->entity_builder->tablename = $this->datatable;
    $this->entity_builder->classname = $this->classname;
    $this->entity_builder->format($list);
    $list = $this->entity_builder->result();*/

    $this->setting->add('item_list', $list);
    //debug($this->setting->get_item('item_list'));

    //debug($item->result());
    //$this->tools($tools, $types);
    //debug($this->datatable);
    //ebug($this->query()->select()->from()->where(array('usi.firstname', 'Alain'))->get('result'));
    /*$select = $this->rule('slug, sta_id');
    $from = $this->rule($this->prefix . $this->datatable);
    $where = $this->rule(array('itm.id', 1));
    //$and_where = $this->rule(array('itm.', 'itm.id'));
    $order_by = $this->rule('id');
    $query = $this->select($select)->from($from)->where($where)->order_by($order_by);
    debug($query->get('query'));*/
    //debug($this->entity('Item'));
    //debug($this->set_datatable('usr_users'));
    //debug($this->refresh(array(), true));
    //debug($this->entity());
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
