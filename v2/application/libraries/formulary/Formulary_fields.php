<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class formulary_fields {

  public $configs = null;

  public $fields = null;

  public $classic_types = null;

  public $custom_types = null;

  public $tag_div = false;

  public $tag_label = false;

  public $output = null;

  public function __construct($fields = array(), $tag_div = true, $tag_label = true) {
    $ci = &get_instance();
    $this->fields = $fields;
    $this->configs = array(
      'div' => array('class' => 'form-group row'),
      'label' => array('class' => 'form-control-label', 'for' => ''),
    );
    $this->classic_types = array(
      'text', 'email', 'password', 'date', 'time', 'datetime-local', 'month', 'url', 'file', 'hidden',
      'range', 'search', 'tel', 'url', 'week', 'number', 'color', 'submit', 'reset', 'button'
    );
    $this->custom_types = array(
      'textarea', 'textarea-tmce', 'checkbox', 'checkbox-md', 'radio', 'radio-md', 'file-dd', 'datetime', // md and other uses views
      'select', 'select-md', 'multiselect', 'multiselect-md'
    );
    $this->tag_div = $tag_div;
    $this->tag_label = $tag_label;
  }

  public function generate($fields = array()) {
    $this->fields = count($fields) ? $fields : $this->fields;
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
      </form>';

    return $output;
  }

  public function input($type = 'text', $name = null, $label = null, $value = null, $config = array()) {
    $output = '';
    $tag_id = isset($config['id']) ? $config['id'] : 'id_'.$name;
    $class = isset($config['class']) ? $config['class'] : 'form-control';
    $this->configs['div']['class'] = (isset($config['div']['class'])) ? $config['div']['class'] : 'form-group';
    $this->configs['label']['for'] = (isset($config['label']['for'])) ? $config['label']['for'] : $tag_id;

    $config = array_merge(
      $config,
      array('type' => $type, 'id' => $tag_id, 'name' => $name, 'value' => $value, 'class' => $class)
    );

    if (in_array($type, $this->classic_types)) {
      $output .= $this->div($config);
      $output .= $this->label($label, $config);
      $output .= '<input ' . $this->attributes($config) . '/>';
      $output .= $this->_div($config);
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


    /*$output .= $this->div($config);
    $output .= $this->label($label, $config);
    $output .= '<textarea ' . $this->attributes($config) . '>' . $value . '</textarea>';
    $output .= $this->_div();*/
    $output = '
      <!--<div class="form-group '.$class_col.'">-->
        <label for="id_'.$name.'" class="form-control-label">'.$label.'</label>
        <textarea ' . $attributes . '>'.$value.'</textarea>
      <!--</div>-->';

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

  public function attributes($config = array(), $except = array()) {
    $attrs = '';

    foreach ($config as $attr => $value) {
      if (!in_array($attr, $except))
        $attrs .= $attr . '="'.$value.'" ';
    }

    return $attrs;
  }

  public function div($config = array()) {
    $output = '';

    if ($this->tag_div) {
      if ($config['type'] == 'hidden')
        return $output;
      if (isset($config['div']) && is_array($config['div'])) {

        $attributes = $this->attributes($config['div']);
        $output = '<div '.$attributes.'>';
      } elseif (!isset($config['div'])) {
        $attributes = $this->attributes($this->configs['div']);
        $output = '<div '.$attributes.'>';
      }
    }

    return $output;
  }

  public function _div($config = array()) {
    $output = '';

    if (isset($config['type']) && $config['type'] == 'hidden')
      return $output;
    if ($this->tag_div) {
      $output = '</div>';
    }

    return $output;
  }

  public function label($label = null, $config = array()) {
    $output = '';

    if ($this->tag_label) {
      if ($config['type'] == 'hidden')
        return $output;
      if (isset($config['label']) && is_array($config['label'])) {
        $attributes = $this->attributes($config['div']);
        $output = '<label ' . $attributes . '>' . $label . '</label>';
      } elseif (!isset($config['label'])) {
        $attributes = $this->attributes($this->configs['label']);
        $output = '<label ' . $attributes . '>' . $label . '</label>';
      }
    }

    return $output;
  }
}
