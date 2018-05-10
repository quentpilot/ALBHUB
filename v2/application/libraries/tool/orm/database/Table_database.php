<?php

require_once APPPATH . 'libraries/tool/orm/database/IORM_database.php';

class Table_database implements IORM_database {

  public $tb_id = null;

  public $tb_primary_key = null;

  public $tb_name = null;

	public function __construct($tablename = null, $prefix = null, $primary_key = 'id') {
    $this->tb_name = is_null($tablename) ? get_class($this) : $tablename;
    $this->tb_id = is_null($prefix) ? explode('_', $this->tb_name)[0] . '_' : $prefix;
    $this->tb_primary_key = $primary_key;
  }

  public function hydrate(object $data) {
    foreach ($data as $key => $value) {
      $this->set($key, $value);
    }
    return $this;
	}

  public function array_to_object(array $data) {
    if (!count($data))
      return null;
    foreach ($data as $key => $value) {
      $this->set($key, $value);
    }
    return $this;
  }

  public function dump($data) {
    if (is_array($data))
      return $this->array_to_object($data);
    elseif (is_object($data)) {
      return $this->hydrate($data);
    }
    return $this;
  }

  public function query(string $sql = null) {
    $ci = &get_instance();

    $result = $ci->db->query($sql)->result();

    if ($result)
      return $this->dump($result[0]);
    return null;
  }

  public function find(string $from = null, $where = null, int $limit = 1, string $order_by = null) {
    $ci = &get_instance();
    $tb_id = $this->tb_id;
    $tb_name = $this->tb_name;
    $tb_primary = $this->tb_id . $this->tb_primary_key;
    $id = $this->$tb_primary;
    $tb_primary = $this->tb_primary_key;

    $from = is_null($from) ? $tb_name : $from;
    $where = is_null($where) ? array($tb_primary, $id) : $where;
    $where = is_string($where) ? explode('=', $where) : $where;
    $where[0] = $tb_id . $where[0];

    $result = $ci->db->select()->from($from)->where($where);

    if ($limit > 0)
        $result->limit($limit);
    if (!is_null($order_by))
        $result->order_by($order_by);

    $result->get()->result();

    if ($result)
      return $this->dump($result);
    return null;
  }

  public function join(string $rtb_from = null, string $rtb_where = null, $limit = 0, $order_by = null) {
    $prefix = explode('_', $this->tb_name)[0];
    $r_prefix = explode('_', $rtb_from)[0];
    $from = $this->tb_name . " AS $prefix, $rtb_from AS $r_prefix";
    $where = $rtb_where;
    return $this->find($from, $where, $limit, $order_by);
  }

  public function select(int $id = 0) {
    $ci = &get_instance();
    $tb_name = $this->tb_name;
    $tb_primary = $this->tb_id . $this->tb_primary_key;

    $result = $ci->db->select()->from($tb_name)->where($tb_primary, $id)->get()->result();

    if ($result)
      return $this->dump($result[0]);
    return null;
  }

  public function insert() {
    $ci = &get_instance();
    $tb_id = $this->tb_id;
    $tb_name = $this->tb_name;
    $tb_primary = $this->tb_id . $this->tb_primary_key;

    $this->unset_tb();

    $result = $ci->db->insert($tb_name, $this);

    $this->set_tb($tb_id, $tb_name, $tb_primary);

    if ($result)
      return $this;
    return null;
  }

  public function update(int $id = -1) {
    $ci = &get_instance();
    $tb_id = $this->tb_id;
    $tb_name = $this->tb_name;
    $tb_primary = $this->tb_id . $this->tb_primary_key;
    $id = ($id < 0) ? $this->$tb_primary : $id;

    $this->unset_tb();

    $result = $ci->db->set($this)->where($tb_primary, $id)->update($tb_name);

    $this->set_tb($tb_id, $tb_name, $tb_primary);

    if ($result)
      return $this;
    return null;
  }

  public function delete(int $id = -1) {
    $ci = &get_instance();
    $tb_id = $this->tb_id;
    $tb_name = $this->tb_name;
    $tb_primary = $this->tb_id . $this->tb_primary_key;
    $id = ($id < 0) ? $this->$tb_primary : $id;

    $this->unset_tb();

    $result = $ci->db->where($tb_primary, $id)->delete($tb_name);

    $this->set_tb($tb_id, $tb_name, $tb_primary);

    if ($result)
      return $this;
    return null;
  }

  public function duplicate() {
    $ci = &get_instance();
    $tb_id = $this->tb_id;
    $tb_name = $this->tb_name;
    $tb_primary = $this->tb_id . $this->tb_primary_key;

    $this->$tb_primary = 0;

    $this->unset_tb();

    $result = $ci->db->insert($tb_name, $this);

    $this->set_tb($tb_id, $tb_name, $tb_primary);

    if ($result)
      return $this;
    return null;
  }

  public function set_tb($id, $name, $primary) {
    $this->tb_id = $id;
    $this->tb_name = $name;
    $this->tb_primary_key = $primary;

    $ci = &get_instance();
    $action = debug_backtrace()[1]['function'];
    if ($action == 'insert' || $action == 'duplicate')
      $type = 'created';
    elseif ($action == 'update')
      $type = 'edited';
    elseif ($action == 'delete')
      $type = 'deleted';
    $ci->user_log->update_user_logs($this, $type);
    return true;
  }

  public function unset_tb() {
    unset($this->tb_id);
    unset($this->tb_name);
    unset($this->tb_primary_key);
    return true;
  }

  /**
  * get method would to return class attribute value entered as param
  */
  public function get(string $property) {
    $prefixed = $this->tb_id . $property;
    if (property_exists($this, $property))
      return $this->$property;
    elseif (property_exists($this, $prefixed))
      return $this->$prefixed;
    return null;
  }

  /**
  * set method would to set attribute choosen with wanted value
  */
  public function set(string $property, $value = null) {
    $prefixed = $this->tb_id . $property;
    if (property_exists($this, $property)) {
      $this->$property = $value;
    } elseif (property_exists($this, $prefixed)) {
      $this->$prefixed = $value;
    }
    return $this;
  }
}
