<?php

require_once APPPATH . 'libraries/transfert/ITransfert.php';

/**
* Validation library class would to run validation protocol from defined rules
*
* You can define validation steps from transfers.php config file or by overloading
* Validation class
*
* @date 2018-03-17
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see Protocol as example
*/
class Validation implements ITransfert {

  protected $config = null;
  protected $transfert = null;
  protected $validators = null;
  protected $error = null;

  public function __construct($transfert = null) {
    $this->config = &get_instance()->config;
    $this->transfert = $transfert;
    $this->validators = $this->config->item('transfert_protocol')['validation'];
  }

  public function run($transfert = null) {
    if (!is_null($transfert))
      $this->transfert = $transfert;
    if (is_null($this->transfert))
      return false;
    return $this->process();
  }

  protected function process() {
    $validators = is_array($this->validators) ? $this->validators : array('request', 'response');

    foreach ($validators as $check) {
      $valid = "is_valid_$check";
      if (!method_exists($this, $valid))
        return false;
      if ($this->$valid($this->transfert))
        return true;
    }
    return false;
  }

  protected function is_valid_request(Req $request = null) {
    //print_r(gettype($request));
    return true;
  }

  protected function is_valid_response(Res $response = null) {
    //print_r(gettype($response));
    return true;
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
