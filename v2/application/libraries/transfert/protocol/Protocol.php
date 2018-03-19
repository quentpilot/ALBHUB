<?php

require_once APPPATH . 'libraries/transfert/protocol/IProtocol.php';

/**
* Protocol library class would to define which actions to do
* for requests and responses data transfered through controllers and models
*
* You can define rules related to main data validation steps called to or from model classes
*
* @date 2018-03-17
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see Transfert as example
*/
class Protocol implements IProtocol {

  /**
  * config attribute would to be an instance of the current CI_Config object
  */
  protected $config = null;

  /**
  * rules attribute would to be an instance of Rules library class
  */
  protected $rules = null;

  /**
  * validation attribute would to be an instance of Validation library class
  */
  protected $validation = null;

  /**
  * error attribute store error messages if protocol failed
  */
  protected $error = null;

  public function __construct(Rules $rules = null, Validation $validation = null) {
    $this->config = &get_instance()->config;
    $this->rules = (is_null($rules)) ? new Rules($this->config->item('transfert_protocol')['rules']) : $rules;
    $this->validation = (is_null($validation)) ? new Validation() : $validation;
  }

  /**
  * set_rules method would to set each rule value needed by protocol validation
  */
  public function set_rules($rules = null) : bool {
    if (is_null($rules))
      return false;
    if ($rules instanceof Rules)
      $this->rules = $rules;
    elseif (is_array($rules) && $this->rules instanceof Rules)
      return $this->rules->set_rules($rules);
    return false;
  }

  /**
  * set_rule method would to set a rule attribute
  */
  public function set_rule($key = null, $value = null) {
    return $this->rules->set($key, $value);
  }

  /**
  * get_rule method would to get a rule attribute
  */
  public function get_rule($key = null) {
    return $this->rules->get($key);
  }

  /**
  * is_valid method runs the validation library class
  */
  public function is_valid(Transfert $transfert = null) : bool {
    if (!$transfert instanceof Transfert)
      return false;
    return $this->validation->run($transfert);
    // check with gettype()
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
