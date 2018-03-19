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

  /**
  * config attribute would to be an instance of the current CI_Config object
  */
  protected $config = null;

  /**
  * transfert attribute would to be a copy of the current Transfert object
  */
  protected $transfert = null;

  /**
  * validators attribute would to be an array of each method to check and valid the current transfert result
  */
  protected $validators = null;

  /**
  * error attribute store error messages if validation failed
  */
  protected $error = null;

  public function __construct($transfert = null) {
    $this->config = &get_instance()->config;
    $this->transfert = $transfert;
    $this->validators = $this->config->item('transfert_protocol')['validation'];
  }

  /**
  * run method would to process the validation of transfert request
  */
  public function run($transfert = null) {
    if (!is_null($transfert))
      $this->transfert = $transfert;
    if (is_null($this->transfert))
      return false;
    return $this->process();
  }

  /**
  * process method would to check each validators method to determine if transfert result is valid
  */
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

  /**
  * is_valid_request method would to check transfert type of request and protocol rules
  */
  protected function is_valid_request(Req $request = null) {
    //print_r(gettype($request));
    return true;
  }

  /**
  * is_valid_response method would to check transfert type of response and protocol rules
  */
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
