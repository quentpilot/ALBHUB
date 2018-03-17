<?php

require_once APPPATH . 'libraries/transfert/ITransfert.php';

/**
* Transfert library class would to manage data transfered between controllers and models classes
* Goal is to help you configure data, returns types when you request a specific model method or class builder
* with a Protocol library class which valid data transfers
*
* @date 2018-03-17
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see MY_Controller, MY_Model as example
*/
class Transfert implements ITransfert {

  protected $ci = null;

  protected $query = null;

  protected $result = null;

  protected $data = null;

  protected $type = null;

  protected $protocol = null;

  protected $error = null;

  public function __construct($query = null, $data = null, $type = null, Protocol $protocol = null) {
    $this->data = $data;
    $this->type = $type;
    $protocol = (is_null($protocol)) ? new Protocol() : $protocol;
  }

  public function query($query = null, $data = null, $type = null) {
    $this->ci = &get_instance();
    $this->data = $data;
    $this->type = $type;
    $this->query = new Query($query);
    $this->protocol = (is_null($this->protocol)) ? new Protocol() : $this->protocol;
    if ($this->query->is_parsed())
      return $this->build();
    return false;
  }

  public function result($model = null, $method = null) {
    if (is_null($model) && is_null($method))
      return $this->result;
    if (is_null($this->data[$method]))
      $this->result[$model."_".$method] = $this->ci->$model->$method();
    else
      $this->result[$model."_".$method] = $this->ci->$model->$method($this->data[$method]);
    return true;
  }

  protected function build() {
    $commands = $this->query->get('parser')->get('commands');
    foreach ($commands as $model => $method) {
      if (!$this->load($model))
        return false;
      if (!$this->result($model, $method))
        return false;
    }
    return $this->is_valid();
  }

  public function load($model) {
    if (!isset($this->ci->$model)) {
      return $this->ci->load->model($model);
    }
    return true;
  }

  public function is_valid() {
    return $this->protocol->is_valid($this);
  }

  /**
  * get transferts history
  */
  public function history() {
    return false;
  }

  /**
  * get method would to return class attribute value entered as param
  */
  public function get($property = null) {
    if (is_null($property))
      return false;
    if (property_exists($this, $property))
      return $this->$property;
  }

  /**
  * set method would to set attribute choosen with wanted value
  */
  public function set($property = null, $value = null) {
    if (is_null($property))
      return false;
    if (property_exists($this, $property)) {
      $this->$property = $value;
      return $value;
    }
    return null;
  }
}
