<?php

require_once APPPATH . 'libraries/transfert/protocol/IProtocol.php';

/**
* Rules library class would to define for each data transfered
* which type or other actions would be returned or done
*
* You can define rules from transfers.php config file, from constructor or by overloading
* Rules class
*
* @date 2018-03-17
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see Protocol, Validation as example
*/
class Rules implements IProtocol {
  protected $query_type = null;
  protected $result_key_name = null;
  protected $result_key_type = null;
  protected $result_value_type = null;

  public function __construct($rules = null) {
    $this->set_rules($rules);

  }

  public function set_rules($rules = null) : bool {
    if (is_null($rules))
      return false;
    elseif (is_array($rules)) {
      foreach ($rules as $key => $value) {
        if (!$this->set($key, $value))
          return false;
      }
      return true;
    }
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
