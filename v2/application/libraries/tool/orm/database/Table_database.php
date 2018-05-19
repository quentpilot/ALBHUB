<?php

require_once APPPATH . 'libraries/tool/orm/database/IORM_database.php';

/**
* Table_database library class would to represents the current datatable representation
* if a query is valid, then Table_database is filled with related db table cols ans values
*/

class Table_database implements IORM_database {

  /**
  * tb_id attribute would be the tablename prefix
  */
  public $tb_id = null;

  /**
  * tb_primary_key attribute would be the datatable primary key/col name
  */
  public $tb_primary_key = null;

  /**
  * tb_name attribute would be the full tablename
  */
  public $tb_name = null;

  /**
  * tb_cache attribute would store each query result merged to an array
  */
  public $tb_cache = array();

	public function __construct($tablename = null, $prefix = null, $primary_key = 'id') {
    $this->tb_name = is_null($tablename) ? get_class($this) : $tablename;
    $this->tb_id = is_null($prefix) ? explode('_', $this->tb_name)[0] . '_' : $prefix;
    $this->tb_primary_key = $this->tb_id . $primary_key;
    $this->tb_cache = array();
  }

  /**
  * ci method would return the current Codeigniter database instance
  */
  public function ci(string $classname = null) {
    $ci = &get_instance();
    $instance = null;

    if (is_null($classname)) {
      $instance = $ci->db;
    } else {
      if (isset($ci->$classname))
        $instance = $ci->$classname;
    }
    return $instance;
  }

  /**
  * hydrate method would to fill object with related data as object
  */
  public function hydrate(object $data) {
    foreach ($data as $key => $value) {
      $status = $this->set($key, $value);
      if (!$status)
        $this->{$key} = $value;

    }
    return $this;
	}

  /**
  * hydrate method would to fill object with related data as object
  */
  public function hydrate_all(array $ci_result, array $tb_ids) {
    $table = $this->ci('datatable_entity');
    $tables = (count($tb_ids)) ? $tb_ids : explode('_', $this->id)[0];
    $datatables = array();

    for ($it = 0; $it < count($ci_result); $it++) {
      $result = array($ci_result[$it]);

      foreach ($tables as $key => $name) {
        $tb = null;
        $name = trim($name);
        $tablename = $this->get_name_from_id($name);

        if (!is_null($tablename)) {
          $table->tablename = $tablename;
          $table->classname = ucfirst($tablename);
          $table->prefix = explode('_', $tablename)[0];
          $table->delim = '_';

          $table->hydrate($result, true);
          $tb = $table->result();
          $cname = get_class($this);
          if ($tb->get('tb_name') == $this->tb_name)
            $datatables[] = $tb;
        }
      }
    }
    return $datatables;
	}

  /**
  * array_to_object method would to fill object with related data as array
  */
  public function array_to_object(array $data) {
    if (!count($data))
      return null;
    foreach ($data as $key => $value) {
      $status = $this->set($key, $value);
      if (!$status)
        $this->{$key} = $value;
    }
    return $this;
  }

  /**
  * dump method would to fill object with related data
  */
  public function dump($data) {
    if (is_array($data))
      return $this->array_to_object($data);
    elseif (is_object($data)) {
      return $this->hydrate($data);
    }
    return $this;
  }

  /**
  * builder method would to return a CI_DB_query_builder response
  * following query builder as string in params
  */
  public function builder(string $query = null) {
    if (is_null($query))
      return null;

    $result = $this->ci();
    $rules = explode('->', $query);

    foreach ($rules as $rule) {
      $result->{$rule};
    }

    if ($result)
      $result->get()->result();

    if ($result) {
      if (count($result) == 1)
        $this->dump($result[0]);
      return $result;
    }
    return $result;
  }

  /**
  * query method would to fill object following SQL query
  */
  public function query(string $sql = null) {
    $ci = $this->ci();

    $result = $ci->query($sql)->result();

    if ($result)
      return $this->dump($result[0]);
    return null;
  }

  /**
  * find method would to fill object following params and return CI query result
  */
  public function find($where = null, string $from = null, int $limit = 0, string $order_by = null) {
    $db = $this->ci();
    $tb_id = $this->tb_id;
    $tb_name = $this->tb_name;
    $tb_primary = $this->tb_primary_key;
    $id = $this->$tb_primary;
    $tb_primary = $this->tb_primary_key;
    $tb_key = explode('_', $tb_primary)[1];
    $id = $this->$tb_primary;

    // set query for CI builder
    $from = is_null($from) ? '' : $from;
    $where = is_null($where) ? array($tb_primary, $id) : $where;
    //$where = is_null($where) ? "$tb_key = $id" : $where;

    // format from string folling a simple or a join query
    $tfrom = $this->from($from);
    $result = $db->select()->from($tfrom);

    // build CI where close
    $result = $this->where($result, $where);

    // build limit and order_by queries
    if ($limit > 0) $result->limit($limit);
    if (!is_null($order_by)) $result->order_by($order_by);

    // get query result
    $result = $db->get()->result();
    
    //debug(count($result[0]));
    if ($result) {
      // set first occurence to himself, then return query result
      $this->dump($result[0]);
      $tables = array(str_replace('_', '', $tb_id));
      $tables = array_merge($tables, explode(',', $from));
      $tbs = $this->hydrate_all($result, $tables);
      $result = $tbs;
      //debug($result);
      return $result;
    }
    return null;
  }

  /**
  * from method would to format a string for CI query build from method
  */
  protected function from(string $from_query) {
    $from_result = null;
    $comma = ', ';

    if ($from_query == '') $comma = '';
    $my_id = str_replace('_', '', $this->tb_id);
    $me = $my_id . $comma;

    $from_query = ($from_query == $my_id) ? $me : $me . $from_query;
    $exp = explode(',', $from_query);

    $it = 1;
    $tables = '';

    foreach ($exp as $prefix) {
      $prefix = strtolower(trim($prefix));
      $name = $this->get_name_from_id($prefix);
      if (!is_null($name)) {
        if (count($exp) == $it) $comma = '';
        $tables .= $name . ' AS ' . $prefix . $comma;
      }
      $it++;
    }

    $from_result = $tables;
    return $from_result;
  }

  /**
  * from method would to format and build a CI query builder where method object
  */
  protected function where(CI_DB_query_builder $query, $where) {
    $result = null;
    $db = $query;
    $rule = $where;

    if (is_string($rule)) {
      $rule = array($rule);
    }

    foreach ($rule as $key => $value) {
      //echo "value";
      //debug($value);

      $close = null;
      $t_exp = explode('.', $value);

      if (count($t_exp) == 3) { // several tables query prefixed (join)
        $c_exp = explode(' ', $t_exp[1]);

        // TODO: create function parsing and creating where query to replace following exploded algo
        if (count($c_exp) == 3 && in_array(strtolower($c_exp[1]), array('=', '!=', '<', '>', '<=', '>=', 'in'))) {
          $left_close = $t_exp[0] . '.' . $t_exp[0]. '_' . $c_exp[0];
          $right_close = $c_exp[2] . '.' . $c_exp[2] . '_' . $t_exp[2];
          $close = $left_close . ' ' . $c_exp[1] . ' ' . $right_close;
          $db->where($close);

          //echo "close";
          //debug($close);
        }
      } /*elseif (count($t_exp) == 1) { // simple table query, generally herself as table/entity object representation, without table dot nor prefix
        $c_exp = explode(' ', $t_exp[0]);
        if (count($c_exp) == 3) {
          $close = implode($c_exp[1], array($c_exp[0] => $c_exp[2]));
          $db->where($close);
        }
        //debug(array($this->tb_primary_key . '_' . $c_exp[0] => $c_exp[2]));
      }*/ else {
        $close = $value;
        $db->where($close);
      }
    }
    $result = $db;
    return $result;
  }

  /**
  * join method would to fill object following params
  */
  public function join(string $jtb_from = null, string $jtb_where = null, $limit = 0, $order_by = null) {
    return $this->find($jtb_where, $jtb_from, $limit, $order_by);
  }

  /**
  * select method would to fill object following params or himself
  */
  public function select($id = null) {
    $ci = $this->ci();
    $tb_name = $this->tb_name;
    $tb_primary = $this->tb_primary_key;
    $id = is_null($id) ? $this->$tb_primary : $id;

    $result = $ci->select()->from($tb_name)->where($tb_primary, $id)->get()->result();

    if ($result)
      return $this->dump($result[0]);
    return null;
  }

  /**
  * insert method would to insert himself
  */
  public function insert() {
    $ci = $this->ci();
    $tb_id = $this->tb_id;
    $tb_name = $this->tb_name;
    $tb_primary = $this->tb_primary_key;

    $this->unset_tb();

    $result = $ci->insert($tb_name, $this);
    $this->$tb_primary = $ci->insert_id();

    $this->set_tb($tb_id, $tb_name, $tb_primary);
    $this->updater();

    if ($result)
      return $this;
    return null;
  }

  /**
  * update method would to update himself
  */
  public function update($id = null) {
    $ci = $this->ci();
    $tb_id = $this->tb_id;
    $tb_name = $this->tb_name;
    $tb_primary = $this->tb_primary_key;
    $id = is_null($id) ? $this->$tb_primary : $id;

    $this->unset_tb();

    $result = $ci->set($this)->where($tb_primary, $id)->update($tb_name);

    $this->set_tb($tb_id, $tb_name, $tb_primary);
    $this->updater();

    if ($result)
      return $this;
    return null;
  }

  /**
  * delete method would to delete himself
  */
  public function delete($id = null, bool $soft = true) {
    $ci = $this->ci();
    $tb_id = $this->tb_id;
    $tb_name = $this->tb_name;
    $tb_primary = $this->tb_primary_key;
    $id = is_null($id) ? $this->$tb_primary : $id;

    if ($soft) {
    $this->set('sta_id', -1);
    $result = $this->update($id);
    } else {
      $result = $ci->where($tb_primary, $id)->delete($tb_name);
    }

    $this->updater();

    if ($result)
      return $this;
    return null;
  }

  /**
  * duplicate method would to copy himself inserting a new col
  */
  public function duplicate() {
    $ci = $this->ci();
    $tb_id = $this->tb_id;
    $tb_name = $this->tb_name;
    $tb_primary = $this->tb_primary_key;

    $this->$tb_primary = 0;

    $this->unset_tb();
    $result = $ci->insert($tb_name, $this);
    $this->$tb_primary = $ci->insert_id();

    $this->set_tb($tb_id, $tb_name, $tb_primary);
    $this->updater();

    if ($result)
      return $this;
    return null;
  }

  /**
  * list method would to find items following params then return an array
  */
  public function list(array $where = array(), int $limit = -1, string $order_by = null) {
    $pre = $this->tb_id;
    $primary = $this->tb_primary_key;
    $where = count($where) ? $where : array($pre . 'sta_id >=', 0);
    $limit = ($limit < 0) ? 30 : $limit;
    $order_by = is_null($order_by) ? $primary : $order_by;
    // not this but an array
    return $this->find(null, $where, $limit, $order_by);
  }

  /**
  * archive method would to set item status to archive him
  */
  public function archive($id = null) {
    $this->set('sta_id', -2);
    $this->update($id);
    return $this;
  }

  /**
  * restore method would to set item status to restore him by edit it on standby
  */
  public function restore($id = null) {
    $this->set('sta_id', 2);
    return $this->update($id);
  }

  /**
  * update method would to update items infos folliwing user action
  */
  public function updater(string $query_type = null, IORM_database $entity = null) {
    $ci = &get_instance();
    $action = is_null($query_type) ? debug_backtrace()[1]['function'] : $query_type;
    $entity = is_null($entity) ? $this : $entity;

    if ($action == 'insert' || $action == 'duplicate')
      $type = 'created';
    elseif ($action == 'update')
      $type = 'edited';
    elseif ($action == 'delete')
      $type = 'deleted';

    return $ci->user_log->update_user_logs($entity, $type);
  }

  /**
  * logs method would to update items infos folliwing user action
  */
  public function logs(string $query_type = null, IORM_database $entity = null) {
    return $this->updater($query_type, $entity);
  }

  /**
  * cache method would to save current db query result
  * or return an array one or several items corresponding to the last queries results
  * if allowed
  */
  public function cache(bool $active = true, string $key = null) {
    if ($active) {
      $tb_cache = $this->tb_cache;
      $cache = $this;

      $cache->unset('tb_cache');
      $cache = (is_null($key)) ? $cache : array(trim($key) => $cache);
      $cache = array_merge(array($cache), $tb_cache);
      $this->add('tb_cache', $cache);
    }
    return (array)$this->tb_cache;
  }

  /**
  * add_tb_id method would to concatenate current table prefix to column name requested
  */
  public function add_tb_id($rows = null) {
    if (is_null($rows))
      return false;
    $rows = is_array($rows) ? $rows : array($rows);
    $cols = array();

    foreach ($rows as $name => $value) {
      $col = $this->tb_id . trim($name);
      $row = array($col => trim($value));
      $cols = array_merge($row, $cols);
      //debug($cols);
    }
    return $cols;
  }

  /**
  * get_name_from_id method would to find the full tablename from an unique table prefix
  */
  public function get_name_from_id(string $prefix = null) {
    if (is_null($prefix))
      return null;
    $db = $this->ci();
    $prefix = str_replace('_', '', $prefix);

    if ($db) {
      $tables = $db->list_tables();
      foreach ($tables as $key => $table) {
        $pre = explode('_', $table)[0];
        if ($pre == $prefix)
          return $table;
      }
    }
    return null;
  }

  /*
  * row method would to concatenate data table column name without any prefix with current object prefix requested
  */
  public function row(string $name = null, IORM_database $datatable = null) {
    $result = '';
    $pre = is_null($datatable) ? $this->tb_id : $datatable->tb_id;
    $name = explode(',', $name);

    foreach ($name as $key => $col) {
      $col = trim($col);
      $delim = '';
      if (($key + 1) < count($name))
        $delim = ', ';
      $result .= $pre . $col . $delim;
    }
    return $result;
  }

  /*
  * add method would to add a property name dynamically to current instance
  */
  public function add(string $property = null, $value = null) {
    if (is_null($property)) return null;
    $this->{$property} = $value;
    return $this->$property;
  }

  /**
  * set_tb method would to reset tb prefixed attributes once unset while a db query action
  * generally used to reset mandatory attributes to work properly
  */
  public function set_tb($id = 0, $name = null, $primary = null) {
    $this->tb_id = $id;
    $name = is_null($name) ? parent::$tb_name : $name;
    $this->tb_name = $name;
    $primary = is_null($primary) ? $this->tb_id . parent::$tb_primary_key : $primary;
    $this->tb_primary_key = $primary;
    return true;
  }

  /**
  * unset_tb method would to delete tb prefixed attributes
  * before to use $this as data when using insert/update CI_DB_query_builder methods
  */
  public function unset_tb() {
    $properties = get_object_vars($this);
    $tb_id = $this->tb_id;

    foreach ($properties as $key => $row) {
      $prefix = substr($row, 0, strlen($tb_id));
      if ($prefix != $tb_id) $this->unset($row);
    }
    return true;
  }

  /*
  * add method would to add a property name dynamically to current instance
  */
  public function unset(string $property = null) : bool {
    if (is_null($property)) return false;
    if (property_exists($this, $property)) {
      unset($this->$property);
      return true;
    }
    return false;
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
    } else {
      return null;
    }
    return $this;
  }
}
