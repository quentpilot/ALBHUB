<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items_manager_setting extends Setting_manager {

  protected $user_id = null;

  protected $item_id = 0;

  protected $item_datatable = null;

  protected $content_datatable = null;

  protected $cat_datatable = null;

  protected $part_datatable = null;

  protected $item_prefix = null;

  protected $content_prefix = null;

  protected $cat_prefix = null;

  protected $part_prefix = null;

  protected $query_string = null;

  protected $status = false;

  public function __construct(array $configs = array()) {
    parent::__construct($configs);
    $this->user_id = $this->ci->session->userdata('user_id');
    $this->item_id = 0;
    $this->item_datatable = 'items';
    $this->item_prefix = 'itm_';
    $this->content_datatable = 'items_content';
    $this->content_prefix = 'itc_';
    $this->cat_datatable = 'layouts_parts';
    $this->cat_prefix = 'lap_';
    $this->part_datatable = 'items_layouts_parts';
    $this->part_prefix = 'ilp_';
  }

  public function set_nav_menu() {
    $config = array(
      'user_id' => $this->user_id,
    );
    $this->set_items($config);
    return $this->result;
  }

  public function set_table() {
    $config = array(
      'user_id' => $this->user_id,
      'dao.table.query_result' => 'array',
    );

    $itm_table = $this->item_prefix.$this->item_datatable;
    $itc_table = $this->content_prefix.$this->content_datatable;
    $lap_table = $this->cat_prefix.$this->cat_datatable;
    $ilp_table = $this->part_prefix.$this->part_datatable;

    $this->query_string = $this->ci->db->select()
                        ->from($itm_table, $itc_table, $lap_table, $ilp_table)
                        ->join($itc_table, "$itc_table.item_id = $itm_table.".$this->item_prefix.'id')
                        ->where($this->item_prefix.'ilp_id', $this->part_prefix.'id')
                        ->limit(50)
                        ->get_compiled_select();

    $this->set_items($config);
    return $this->result;
  }

  public function set_pagination() {
    $config = array(
      'user_id' => $this->user_id,
    );
    $this->set_items($config);
    return $this->result;
  }

  public function set_form_config() {
    $config = array(
      'user_id' => $this->user_id,
    );
    $this->set_items($config);
    return $this->result;
  }
}
