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

  /**
  * ci attribute would to store an instance CodeIgniter object
  */
  protected $ci = null;

  /**
  * query attribute is the current query asked by controller to load and get
  * model/method data
  */
  protected $query = null;

  /**
  * result attribute is the final result of the model(s) method(s) called by controller
  */
  protected $result = null;

  /**
  * data attribute is an optional data to send to one or several model method
  */
  protected $data = null;

  /**
  * type attribute is an optional cutom value to identify request type through model
  */
  protected $type = null;

  /**
  * protocol attribute is the current Protocol object to use to format and valid
  * a model/method return value
  */
  protected $protocol = null;

  /**
  * error attribute store error messages if transfert failed
  */
  protected $error = null;

  public function __construct($query = null, $data = null, $type = null, Protocol $protocol = null) {
    $this->data = $data;
    $this->type = $type;
    $protocol = (is_null($protocol)) ? new Protocol() : $protocol;
  }

  /**
  * query method would to set needed attributes, then parse and valid return values
  */
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

  /**
  * result method would to returnthe final result or launch method wanted by controller request
  */
  public function result($model = null, $method = null) {
    if (is_null($model) && is_null($method))
      return $this->result;
    if (is_null($this->data[$method]))
      $this->result[$model."_".$method] = $this->ci->$model->$method();
    else
      $this->result[$model."_".$method] = $this->ci->$model->$method($this->data[$method]);
    return true;
  }

  /**
  * build method would to load and get each model(s) method(s) asked by controller
  */
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

  /**
  * load method would to load the current model if isn't instanciated yet
  */
  public function load($model) {
    // check sub models slash and restore them
    if (!isset($this->ci->$model)) {
      return $this->ci->load->model($model);
    }
    return true;
  }

  /**
  * is_valid method would to return the protocol validation status
  */
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
