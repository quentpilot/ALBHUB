<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/manager/form/IForm_manager.php';

class Items_manager_form extends Tools_manager implements IForm_manager {

  protected $view_file = null;

  protected $file_data = null;

  protected $rules = null;

  protected $form = null;

  public function __construct(Items_manager_setting $configs = null) {
    parent::__construct($configs);
    $this->view_file = $this->ci->uri->segment(4);
    $this->file_data = array('table_data_format' => array('title' => $this->view_file));
    $this->rules = 'manager/items';
    $this->form = $this->ci->formulary;
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
    $this->ci = &get_instance();
    $this->configs = $configs;
    $this->configs->add('form.table', 'table done');
    $folder = explode('/', $this->ci->get('view')->get('folder'));
    unset($folder[count($folder) - 1]);
    $folder = implode('/', $folder).'/';
    //$this->result = $this->ci->load->view($folder.'list', null, true);
    $this->result = $folder;
    return true;
  }

  public function load_edit(Items_manager_setting $configs = null) {
    $this->ci = &get_instance();
    $this->configs = $configs;
    $this->configs->add('form.edit', 'form done');
    $entity = $this->configs->get_item('model.form_edit');
    $result['entity'] = $entity;

    $config = array(
      'entity' => $entity,
      'view' => $this->configs->get_item('tb_view'),
      'class_col' => 'col-lg-8',
      'fields' => array(
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
    );

    $result = $config;

    $form = $this->form;

    $form->title = 'Edition de ' . $entity->get('title');
    $form->describe = 'Formulaire destiné à modifier l\'élément ' . $entity->get('title');

    $form->config($config);
    $form->build();
    $result['view'] = $form->output;

    //$this->orm->datatable = 'itc_items_contents';
    //$this->orm->prefix = 'itc';
    //debug($this->orm->entities(array('itc', 'itm')));

    $form->title = 'Options de l\'élément ' . $entity->get('title');
    $form->describe = 'Formulaire destiné à modifier les options de configuration de l\'élément ' . $entity->get('title');

    $config['class_col'] = 'col-lg-4';
    $config['fields'] = array(
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
          //'class_col' => 'col-lg-4',
        ),
      ),
    );

    //$form->config($config);
    //$form->build();
    //$result['view'] .= $form->output;
    //$form_option->build();
    $this->result = $result;
    return true;
  }

  public function is_valid(IORM_Database $entity = null, $except = array()) {
    $this->ci = &get_instance();
    $this->rules .= '/' . $this->orm->type . '/edit';
    $post = $this->ci->input->post();
    $except = count($except) ? $except : array('submit');
    $it = 0;

    if (is_null($entity))
      return false;
    if (!$post)
      return false;

    $entity->dump($this->ci->input->post());

    foreach ($post as $key => $value) {
      if (!in_array($key, $except)) {
        if (is_null($entity->get($key))) {
          return false;
        }
      } elseif (isset($except[$it])) {
        $attr = $except[$it];
        if (property_exists($entity, $attr)) {
          unset($entity->$attr);
        }
        $it++;
      }
    }
    return ($this->form->validation($this->rules)) ? $entity : false;
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
