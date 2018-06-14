<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items_manager_setting extends Setting_manager {

  public $user_id = null;

  public $delim = null;

  protected $item_datatable = null;

  protected $content_datatable = null;

  protected $cat_datatable = null;

  protected $part_datatable = null;

  protected $item_prefix = null;

  protected $content_prefix = null;

  protected $cat_prefix = null;

  protected $part_prefix = null;

  protected $query_string = null;

  protected $view_folder = null;

  protected $status = false;

  public function __construct(array $configs = array()) {
    parent::__construct($configs);
    $this->user_id = $this->ci->session->userdata('user_id');
    $this->type = null;
    $this->delim = '_';
    $this->item_datatable = 'items';
    $this->item_prefix = 'itm';
    $this->content_datatable = 'items_content';
    $this->content_prefix = 'itc';
    $this->cat_datatable = 'layouts_parts';
    $this->cat_prefix = 'lap';
    $this->part_datatable = 'items_layouts_parts';
    $this->part_prefix = 'ilp';
    $this->view_folder = 'admin/admalbi/manager/items/';
  }

  public function set_nav_menu() {
    $config = array(
      'user_id' => $this->user_id,
    );
    $this->set_items($config);
    return $this->result;
  }

  public function set_table() {
    $post_lan_code = get_lang_code();
    $post_limit = empty($_POST['tb_limit']) ? 0 : $_POST['tb_limit'];
    $post_order_by = $this->ci->input->post('tb_order_by');
    $post_order_by = (is_null($post_order_by)) ? 'itm.itm_id' : $post_order_by;
    $post_like = empty($_POST['tb_search']) ? null : $_POST['tb_search'];

    $query_lan_id = get_lang_id($post_lan_code);
    $query_type = substr($this->type, 0, strlen($this->type) - 1);
    $query_from = $this->content_prefix . ', ' . $this->cat_prefix . ', ' . $this->part_prefix . ', sta';
    $query_like = is_null($post_like) ? "" : "itm.itm_title = '$post_like'";

    $tb_limit = is_null($post_limit) ? 25 : $post_limit;
    $tb_order_by = is_null($this->ci->input->post('tb_order_by')) ? 'itm.itm_id' : $this->ci->input->post('tb_order_by');
    $tb_action_url = '{site_url}/admin/manager/items/' . $this->type;

    $config = array(
      'user_id' => $this->user_id,
      'dao.table.query_result' => 'array',
      // set orm model request
      'tb_from' => $query_from,
      'tb_limit' => $tb_limit,
      'tb_order_by' => $tb_order_by,
      'tb_view' => 'admin/admalbi/manager/items/list',
      'tb_where' => array(
        // TODO: join lan.lan_id
        //'sta.sta_id = 1',
        'itm.sta_id = sta.id',
        'itm.ilp_id = ilp.id',
        'ilp.lap_id = lap.id',
        'itc.itm_id = itm.id',
        //"lan.lan_id = $query_lan_id",
        //"itl.itl_lan_id = $query_lan_id",
        //"lan.id = itl.lan_id",
        //"itm.id = itl.itm_id",
        //"lap.lap_alias = '$query_type'",
        //$query_like,
      ),
      // set datatable view list related to orm model request
      /*'tb_head' => array(
        'tb_primary_key' => 'ID',
        'title' => 'Titre',
        'subtitle' => 'Sous titre',
        'slug' => 'Alias',
        'ilp_name' => 'Type',
        'lap_name' => 'Catégorie',
        'itc_tags' => 'Tags',
        'sta_name' => 'Statut',
      ),*/
      'tb_head' => array(
        'tb_primary_key' => 'ID',
        'itm_title' => 'Titre',
        'itm_subtitle' => 'Sous titre',
        'itc_slug' => 'Alias',
        'ilp_name' => 'Type',
        'lap_name' => 'Catégorie',
        'itc_tags' => 'Tags',
        'sta_name' => 'Statut',
      ),
      'tb_action' => array(
        'edit' => array(
          'col' => null,
          'title' => "Modifier",
          'icon' => 'fa fa-edit',
          'target' => '_self',
          'url' => $tb_action_url,
          'level' => 'info'
        ),
        'copy' => array(
          'col' => null,
          'title' => "Dupliquer l'élément",
          'icon' => 'fa fa-copy',
          'target' => '_self',
          'url' => $tb_action_url,
          'level' => 'warning'
        ),
        'delete' => array(
          'col' => null,
          'title' => "Supprimer",
          'icon' => 'fa fa-trash',
          'target' => '_self',
          'url' => $tb_action_url,
          'level' => 'danger'
        ),
        'active' => array (
          'col' => null,
          'title' => "Publier / Dépublier l'élément",
          'icon' => 'fa fa-eye-slash',
          'target' => '_self',
          'url' => $tb_action_url,
          'level' => 'primary'
        ),
      ),
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

  public function set_form_edit($entity) {
    $config = array(
      'item_id' => $this->item_id,
      'tb_view' => 'admin/admalbi/manager/items/form',
      'form_fields' => array(
        'entity' => $entity,
        'view' => 'admin/admalbi/manager/items/form',
        'class_col' => 'col-lg-8',
        'fields' => array(
          array(
            'type' => 'hidden',
            'name' => 'tb_name',
            'label' => '',
            'value' => /*'itc_items_contents',*/$entity->get('tb_name'),
            'config' => array(
              'class' => 'form-control',
              //'class_col' => 'col-lg-4',
            ),
          ),
          array(
            'type' => 'text',
            'name' => 'title',
            'label' => 'Titre',
            'value' => $entity->get('title'),
            'config' => array(
              'class' => 'form-control',
              //'class_col' => 'col-lg-4',
            ),
          ),
          array(
            'type' => 'text',
            'name' => 'subtitle',
            'label' => 'Sous-titre',
            'value' => $entity->get('subtitle'),
            'config' => array(
              'class' => 'form-control',
              //'class_col' => 'col-lg-4',
            ),
          ),
          array(
            'type' => 'text',
            'name' => 'slug',
            'label' => 'Alias',
            'value' => $entity->get('slug'),
            'config' => array(
              'class' => 'form-control',
            ),
          ),
          array(
            'type' => 'textarea',
            'name' => 'table_content',
            'label' => 'Contenu',
            'value' => $entity->get('table_content'),
            'config' => array(
              'class' => 'form-control',
              'rows' => '5',
            ),
          ),
          array(
            'type' => 'submit',
            'name' => 'submit',
            'label' => '',
            'value' => 'Enregistrer',
            'config' => array(
              'class' => 'form-control input-success',
            ),
          ),
        ),
      )
    );

    $this->set_items($config);
    return $this->result;
  }

  public function set_form_edit_content($entity) {
    $config = array(
      'item_id' => $this->item_id,
      'tb_view' => 'admin/admalbi/manager/items/form',
      'form_fields' => array(
        'entity' => $entity,
        'view' => 'admin/admalbi/manager/items/form',
        'class_col' => 'col-lg-8',
        'fields' => array(
          array(
            'type' => 'hidden',
            'name' => 'tb_name',
            'label' => '',
            'value' => /*'itc_items_contents',*/$entity->get('tb_name'),
            'config' => array(
              'class' => 'form-control',
              //'class_col' => 'col-lg-4',
            ),
          ),
          array(
            'type' => 'text',
            'name' => 'url_name',
            'label' => 'Nom d\'accès URL',
            'value' => $entity->get('url_link'),
            'config' => array(
              'class' => 'form-control col-lg-4',
            ),
          ),
          array(
            'type' => 'text',
            'name' => 'url_link',
            'label' => 'Lien URL',
            'value' => $entity->get('url_link'),
            'config' => array(
              'class' => 'form-control col-lg-4',
            ),
          ),
          array(
            'type' => 'text',
            'name' => 'url_target',
            'label' => 'Cible de l\'URL',
            'value' => $entity->get('url_target'),
            'config' => array(
              'class' => 'form-control col-lg-4',
            ),
          ),
          array(
            'type' => 'textarea',
            'name' => 'text_content',
            'label' => 'Contenu princpal',
            'value' => $entity->get('text_content'),
            'config' => array(
              'class' => 'form-control',
              'rows' => '5',
            ),
          ),
          array(
            'type' => 'submit',
            'name' => 'submit',
            'label' => '',
            'value' => 'Enregistrer',
            'config' => array(
              'class' => 'form-control input-success',
            ),
          ),
        ),
      )
    );

    $this->set_items($config);
    return $this->result;
  }

  public function set_form_edit_config($entity) {
    $config = array(
      'item_id' => $this->item_id,
      'tb_view' => 'admin/admalbi/manager/items/form',
      'form_fields' => array(
        'entity' => $entity,
        'view' => 'admin/admalbi/manager/items/form',
        'class_col' => 'col-lg-8',
        'fields' => array(
          array(
            'type' => 'hidden',
            'name' => 'tb_name',
            'label' => '',
            'value' => /*'itc_items_contents',*/$entity->get('tb_name'),
            'config' => array(
              'class' => 'form-control',
              //'class_col' => 'col-lg-4',
            ),
          ),
          array(
            'type' => 'text',
            'name' => 'title',
            'label' => 'Titre',
            'value' => $entity->get('title'),
            'config' => array(
              'class' => 'form-control',
              //'class_col' => 'col-lg-4',
            ),
          ),
          array(
            'type' => 'text',
            'name' => 'subtitle',
            'label' => 'Sous-titre',
            'value' => $entity->get('subtitle'),
            'config' => array(
              'class' => 'form-control',
              //'class_col' => 'col-lg-4',
            ),
          ),
          array(
            'type' => 'text',
            'name' => 'slug',
            'label' => 'Alias',
            'value' => $entity->get('slug'),
            'config' => array(
              'class' => 'form-control',
            ),
          ),
          array(
            'type' => 'textarea',
            'name' => 'table_content',
            'label' => 'Contenu',
            'value' => $entity->get('table_content'),
            'config' => array(
              'class' => 'form-control',
              'rows' => '5',
            ),
          ),
          array(
            'type' => 'submit',
            'name' => 'submit',
            'label' => '',
            'value' => 'Enregistrer',
            'config' => array(
              'class' => 'form-control input-success',
            ),
          ),
        ),
      )
    );

    $this->set_items($config);
    return $this->result;
  }

  public function set_active() {
    $config = array(
      'item_id' => $this->item_id,
      'tb_view' => 'admin/admalbi/manager/items/list',
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
