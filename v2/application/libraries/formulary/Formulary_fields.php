<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class formulary_fields {

  public $configs = null;

  public $fields = null;

  public $classic_types = null;

  public $custom_types = null;

  public $output = null;

  public function __construct() {
    $ci = &get_instance();
    $this->fields = array();
    $this->classic_types = array(
      'text', 'email', 'password', 'date', 'time', 'datetime-local', 'month', 'url', 'file',
      'range', 'search', 'tel', 'url', 'week', 'number', 'color', 'submit', 'reset', 'button'
    );
    $this->custom_types = array(
      'textarea', 'checkbox', 'radio'
    );
  }

  public function generate($fields = array()) {
    $this->fields = $fields;
    $output = '';
    foreach ($fields as $key => $value) {
      $output .= $this->input($value['type'], $value['name'], $value['label'], $value['value'], $value['config']);
    }
    $this->output = $this->form($output);
    return $this->output;
  }

  public function add() {
    return $this;
  }

  public function attributes($config = array(), $except = array()) {
    $attrs = '';

    foreach ($config as $attr => $value) {
      if (!in_array($attr, $except))
        $attrs .= $attr . '="'.$value.'" ';
    }

    return $attrs;
  }

  public function form($fields = null, $action = '', $method = 'post', $enctype = 'multipart/form-data', $config = array()) {
    $class = isset($config['class']) ? $config['class'] : 'form-control';
    $config = array_merge(
      $config,
      array('action' => $action, 'method' => $method, 'enctype' => $enctype, 'class' => $class)
    );

    $output = '';
    $attributes = $this->attributes($config);
    $fields = is_null($fields) ? $this->output : $fields;
    $class_col = isset($config['class_col']) ? $config['class_col'] : '';

    $output = '
        <form ' . $attributes . '>
          ' . $fields . '
        </form>
        ';

    return $output;
  }

  public function input($type = 'text', $name = null, $label = null, $value = null, $config = array()) {
    $class = isset($config['class']) ? $config['class'] : 'form-control';
    $config = array_merge(
      $config,
      array('type' => $type, 'id' => "id_$name", 'name' => $name, 'value' => $value, 'class' => $class)
    );

    $output = '';
    $attributes = $this->attributes($config);
    $class_col = isset($config['class_col']) ? $config['class_col'] . 'form-group' : 'form-group';

    if (in_array($type, $this->classic_types)) {
      $output = '
        <div class="'.$class_col.'">
          <label for="id_'.$name.'" class="form-control-label">'.$label.'</label>
          <input ' . $attributes . '/>
        </div>';
    } elseif (in_array($type, $this->custom_types)) {
      $input_method = 'input_' . $type;
      if (method_exists($this, $input_method))
      $output = $this->$input_method($name, $label, $value, $config);
    }
    return $output;
  }

  public function input_textarea($name = null, $label = null, $value = null, $config = array()) {
    $except = array('type');
    $output = '';
    $class = isset($config['class']) ? $config['class'] : 'form-control';
    $cols = isset($config['cols']) ? $config['cols'] : '';

    $class_col = isset($config['class_col']) ? $config['class_col'] : '';
    $attributes = is_string($config) ? $config : null;

    if (is_array($config)) {
      $config = array_merge(
        $config,
        array('id' => "id_$name", 'name' => $name, 'class' => $class)
      );
    }

    $attributes = is_null($attributes) ? $this->attributes($config, $except) : $attributes;

    $output = '
      <div class="form-group '.$class_col.'">
        <label for="id_'.$name.'" class="form-control-label">'.$label.'</label>
        <textarea ' . $attributes . '>'.$value.'</textarea>
      </div>';

    return $output;
  }

  public function input_checkbox($name = null, $label = null, $value = null, $config = array()) {
    $output = '';
    $class = isset($config['class']) ? $config['class'] : 'form-control';
    $class_col = isset($config['class_col']) ? $config['class_col'] : '';

    $output = '
      <div class="form-group '.$class_col.'">
        <label for="id_'.$name.'" class="form-control-label">'.$label.'</label>
        <input type="'.$type.'" id="id_'.$name.'" name="'.$name.'" class="'.$class.'" value="'.$value.'"/>
      </div>';

    return $output;
  }

  public function input_radio($name = null, $label = null, $value = null, $config = array()) {
    $output = '';
    $class = isset($config['class']) ? $config['class'] : 'form-control';
    $class_col = isset($config['class_col']) ? $config['class_col'] : '';

    $output = '
      <div class="form-group '.$class_col.'">
        <label for="id_'.$name.'" class="form-control-label">'.$label.'</label>
        <input type="'.$type.'" id="id_'.$name.'" name="'.$name.'" class="'.$class.'" value="'.$value.'"/>
      </div>';

    return $output;
  }
}
