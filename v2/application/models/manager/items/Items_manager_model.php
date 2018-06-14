<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/manager/IManager_model.php';

class Items_manager_model extends MY_Manager_Model implements IManager_model {

  public function __construct(string $datatable = null, string $classname = null, $id = 0, $delim = '_', $it = null, IDatatable_builder $table_builder = null, IORM_entity $entity = null, IORM_query $query = null, IORM_result $result = null, string $type = null, IDao_manager $dao = null, IFormat_manager $format = null, IForm_manager $form = null) {
    parent::__construct($datatable, $classname, $id, $delim, $it, $table_builder, $entity, $query, $result, $type, $dao, $format, $form);
    $this->datatable = is_null($this->setting) ? null : $this->setting->get('item_prefix') . $this->delim . $this->setting->get('item_datatable');
    $this->prefix = is_null($this->setting) ? null : $this->setting->get('item_prefix');
    $this->delim = is_null($this->setting) ? $this->delim : $this->setting->get('delim');
    $this->tablename = is_null($this->datatable) ? null : explode($this->delim, $this->datatable)[1];
    if (!empty($this->setting))
      $this->setting->set('type', $this->type);
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

    $tools = array('dao', 'format', 'form', 'table');
    $types = array('table', 'table', 'table', 'table');

    $tb_from = $this->setting->get_item('tb_from');
    $tb_where = $this->setting->get_item('tb_where');
    $tb_limit = $this->setting->get_item('tb_limit');
    $tb_order_by = $this->setting->get_item('tb_order_by');

    $entities = $this->entity()->factory()->find_all($tb_where, $tb_from, $tb_limit, $tb_order_by);

    //debug($entities);

    $entity = $this->entity()->factory();
    $list = $entity->find($tb_where, $tb_from, $tb_limit, $tb_order_by);
    $this->setting->add('model.list', $list);



    /*for ($it = 0; $it < count($list); $it++) {
      if ($it % 5 == 0) {
        debug($list[$it]);
        debug($list[$it + 1]);
      }
    }*/

    //debug($list);
    //die();

    $this->tools($tools, $types);

    $datatable = $this->table->result;
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

    $tools = array('form');
    $types = array('edit');

    /**/

    /*$this->setting->set_table();
    $tb_from = $this->setting->get_item('tb_from');
    $tb_where = $this->setting->get_item('tb_where');
    $tb_limit = $this->setting->get_item('tb_limit');
    $tb_order_by = $this->setting->get_item('tb_order_by');

    $entity = $this->entity()->factory();
    $list = $entity->find($tb_where, $tb_from, $tb_limit, $tb_order_by);*/

    //$entity = $this->entity()->factory();
    //debug($entity);
    //$entities = $this->entities()->factory();
    //debug($entities);

    /**/

    $entity = $this->entity()->factory();
    $entity->select($this->setting->item_id);

    $this->setting->set_form_edit($entity);

    if (($valid = $this->form->is_valid($entity))) {
      $entity = $valid;
      $entity->update();
        //debug($valid);
    } else {
      // TODO: debug form error
    }

    $this->setting->add('model.form_edit.title', 'Edition de ' . $entity->get('title'));
    $this->setting->add('model.form_edit.describe', 'Formulaire destiné à modifier l\'élément ' . $entity->get('title'));
    $this->setting->add('model.form_edit', $entity);

    $this->tools($tools, $types);

    $form = $this->form->result;
    $this->result = $form;
    return $this->result;
  }

  public function form_edit_content(Items_manager_setting $configs = null) {
    $this->set_configs($configs);

    $tools = array('form');
    $types = array('edit');

    //$this->prefix = 'itc';
    //$this->refresh();
    //$this->datatable = 'itc_items_content';
    $entity = $this->entity('Page_Content', 'itc')->factory()
                ->set('tb_primary_key', 'itc_itm_id')
                ->select($this->setting->item_id);

    $this->setting->set_form_edit_content($entity);

    if (($valid = $this->form->is_valid($entity))) {
      $entity = $valid;
      //debug($entity);
      die();
      $entity->update();
    } else {
      // TODO: debug form error
    }
    $this->setting->add('model.form_edit.title', 'Edition du contenu');
    $this->setting->add('model.form_edit.describe', 'Formulaire destiné à modifier le contenu de l\'élément');
    $this->setting->add('model.form_edit', $entity);

    $this->tools($tools, $types);

    $form = $this->form->result;
    $this->result = $form;
    return $this->result;
  }

  public function form_edit_config(Items_manager_setting $configs = null) {
    $this->set_configs($configs);

    $tools = array('form');
    $types = array('edit');

    $entity = $this->entity()->factory();
    $entity->select($this->setting->item_id);

    $this->setting->set_form_edit_config($entity);

    if (($valid = $this->form->is_valid($entity))) {
      $entity = $valid;
      $entity->update();
    } else {
      // TODO: debug form error
    }

    $this->setting->add('model.form_edit.title', 'Edition de ' . $entity->get('title'));
    $this->setting->add('model.form_edit.describe', 'Formulaire destiné à modifier l\'élément ' . $entity->get('title'));
    $this->setting->add('model.form_edit', $entity);

    $this->tools($tools, $types);

    $form = $this->form->result;
    $this->result = $form;
    return $this->result;
  }

  public function active(Items_manager_setting $configs = null) {
    $this->set_configs($configs);
    $this->setting->set_active();
    $entity = $this->entity()->factory();
    $entity->select($this->setting->item_id);

    $sta_id = $entity->get('sta_id');

    if ($sta_id)
      $sta_id = 0;
    else
      $sta_id = 1;

    $entity->set('sta_id', $sta_id)
           ->update();

    $this->result = $entity;
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
