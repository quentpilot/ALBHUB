<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends MY_Model {

  /**
  * query attribute would be the database query type to build
  */
  protected $query = null;

  /**
  * category_name attribute is the current item category alias in db
  */
  protected $category_name = 'item';

  /**
  * table attribute would be the current datatable name related to item type
  */
  protected $table = 'albi_items';

  public function __construct($cat_alias = 'item', $query = null, $datatable = 'albi_items') {
    parent::__construct();
    $this->category_name = $cat_alias;
    $this->query = $query;
    $this->table = $datatable;
  }

  protected function build_query($query = null) : bool {
    if (is_null($query))
      $query = $this->query;
    if (is_string($query))
      return true;
    elseif ($query instanceof $this->db)
      return true;
    return false;
    // then build as CI  db->query($query)
    // else build as CI db query builder

  }

  public function select($query = null) {
    $result = array();
    if (!$this->build_query())
      return false;
    return $result;
  }

  public function insert($query = null) : bool {
    $result = array();
    if (!$this->build_query())
      return false;
    return $result;
  }

  public function update($query = null) : bool {
    $result = array();
    if (!$this->build_query())
      return false;
    return $result;
  }

  public function delete($query = null) : bool {
    $result = array();
    if (!$this->build_query())
      return false;
    return $result;
  }

  public function exists($id = null) : bool {
    $result = $this->count();
    if ($result)
      return true;
    return false;
  }

  public function count($query = null) : int {
    $result = array();
    if (!$this->build_query())
      return false;
    return $result;
  }

  public function get_by_slug($slug = null) {

  }

  public function get_by_cat_id($cat_id = null) {

  }

  public function get_by_cat_name($cat_name = null) {
    if (is_null($cat_name))
      $cat_name = $this->category_name;
    return false;
  }
}
