<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items_manager_setting extends Setting_manager {

  protected $user_id = null;

  protected $item_id = 0;

  protected $item_datatable = null;

  protected $content_datatable = null;

  protected $part_datatable = null;

  protected $item_prefix = null;

  protected $content_prefix = null;

  protected $part_prefix = null;

  protected $status = false;

  public function __construct(array $configs = array()) {
    parent::__construct($configs);
    $this->user_id = $this->ci->session->userdata('user_id');
    $this->item_id = 0;
    $this->item_datatable = 'items';
    $this->item_prefix = 'itm_';
    $this->content_datatable = 'items_content';
    $this->content_prefix = 'itc_';
    $this->part_datatable = 'items_layouts_parts';
    $this->part_prefix = 'ilp_';
  }

  public function set_table() {
    $config = array(
      'user_id' => $this->user_id,
    );
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
}
