<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
   *
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

   protected $request = null;
   protected $view = null;

   public function __construct($template_name = null) {
     parent::__construct();
     $this->request = $this->req;
     $this->response = $this->res;
     $this->view = new Render(true);
     $this->_config($template_name);
   }

   protected function _config($template_name = null) {
     // set template dynamically from db or config file
     if (!is_null($template_name))
 		  $this->config->set_item('tpl_public_name', $template_name);
     else
      $this->config->set_item('tpl_public_name', 'albi-corporate');
   }

   public function render($view = 'index', $data = null, $return = false, $parser = true) {
     return $this->view->render($view, $data, $return, $parser);
   }

   public function _error_404() {
     $error_404 = array('heading' => 'Page not found', 'message' => 'The page you wish seems to be a dream...');
     $this->data = $error_404;
     $view = '../../../errors/404';
     $this->data['page_bar']['title'] = '404 error ' . space(3, true) . '-' . space(3, true) . ' page not found';
     return $this->render($view, $this->data);
   }

   public function request($query = null, $data = null, $type = null) {
     $this->request->query($query, $data, $type);
     return $this->request->result();
     //return $this->response();
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

class MY_Admin_Controller extends MY_Controller {

  public function __construct($template_name = null) {
    parent::__construct();
    $this->_connect();
		$this->_config($template_name);
  }

  protected function _connect() {
    //$this->user_log->set('status', 1);
    if (!$this->user_log->is_loged() && (($this->uri->rsegment(1) != 'user') || ($this->uri->rsegment(2) == 'profile')))
      redirect('admin/user/login');
  }

	protected function _config($template_name = null) {
		// set template dynamically from db or config file
    if (!is_null($template_name))
		  $this->config->set_item('tpl_admin_name', $template_name);
    else
      $this->config->set_item('tpl_admin_name', 'admalbi');
	}
}

/*class MY_ORM_Controller extends MY_Controller {
  public function __construct($template_name = null) {
    parent::__construct($template_name);
    $this->data = array();
    $this->view->set('folder', 'manager');
  }

  public function manager(string $manager_type, string $method) {
    $model = ucfirst(strtolower($manager_type)) . '_manager_model';
    if (class_exists($model)) {
      $model = strtolower($model);
      if (isset($this->$model)) {
        if (method_exists($this->$model, $method)) {
          $result = $this->$model->$method();
          $result = is_array($result) ? array("data_" . $method => $result) : array("data_" . $method => array($result));
          $this->data = array_merge($this->data, $result);
          $views = $this->view->get('view');
          $views = is_array($views) ? $views : array($views);
          $this->view->set('view', array_merge($views, $this->$model->get('format')->load_views()));
          //TODO : pseudo API when url got manager method and args
          if (count($this->uri->segments) == 7 && $this->uri->segment(5) == 'manager')
            print_r(json_encode($result));
          return $result;
        }
      }
    }
    return false;
  }
}

class MY_Admin_ORM_Controller extends MY_Admin_Controller {
  public function __construct($template_name = null) {
    parent::__construct($template_name);
    $this->data = array();
    $this->view->set('folder', 'manager');
  }

  public function manager(string $manager_type, string $method) {
    $model = ucfirst(strtolower($manager_type)) . '_manager_model';
    if (class_exists($model)) {
      $model = strtolower($model);
      if (isset($this->$model)) {
        if (method_exists($this->$model, $method)) {
          $result = $this->$model->$method();
          $result = is_array($result) ? array("data_" . $method => $result) : array("data_" . $method => array($result));
          $this->data = array_merge($this->data, $result);
          $views = $this->view->get('view');
          $views = is_array($views) ? $views : array($views);
          $this->view->set('view', array_merge($views, $this->$model->get('format')->load_views()));
          //TODO : pseudo API when url got manager method and args
          if (count($this->uri->segments) == 7 && $this->uri->segment(5) == 'manager')
            print_r(json_encode($result));
          return $result;
        }
      }
    }
    return false;
  }

class MY_Manager_Controller extends MY_Controller {

  protected $data = null;

	public function __construct($template_name = null) {
    parent::__construct($template_name);
    $this->data = array();
    $this->view->set('folder', 'manager');
  }

  public function manager(string $manager_type, string $method) {
    $model = ucfirst(strtolower($manager_type)) . '_manager_model';
    if (class_exists($model)) {
      $model = strtolower($model);
      if (isset($this->$model)) {
        if (method_exists($this->$model, $method)) {
          $result = $this->$model->$method();
          $result = is_array($result) ? array("data_" . $method => $result) : array("data_" . $method => array($result));
          $this->data = array_merge($this->data, $result);
          $views = $this->view->get('view');
          $views = is_array($views) ? $views : array($views);
          $this->view->set('view', array_merge($views, $this->$model->get('format')->load_views()));
          //TODO : pseudo API when url got manager method and args
          if (count($this->uri->segments) == 7 && $this->uri->segment(5) == 'manager')
            print_r(json_encode($result));
          return $result;
        }
      }
    }
    return false;
  }
}*/

class MY_ORM_Controller extends MY_Controller {
  public function __construct($template_name = null) {
    parent::__construct($template_name);
  }
}

class MY_Admin_ORM_Controller extends MY_Admin_Controller {
  public function __construct($template_name = null) {
    parent::__construct($template_name);
  }
}

class MY_Manager_Controller extends MY_ORM_Controller {
  public function __construct($template_name = null) {
    parent::__construct($template_name);
  }
}

class MY_Admin_Manager_Controller extends MY_Admin_ORM_Controller {

  protected $manager = null;

  protected $validator = null; // nop

  protected $entity = null;

  protected $data = null;

	public function __construct($template_name = null) {
    parent::__construct($template_name);
    $this->manager = null;
    $this->entity = null;
    $this->data = array();
    $this->view->set('folder', 'manager');
  }

  protected function entity() {
    return $this->entity;
  }

  protected function validator() {
    return $this->validator;
  }

  public function manager(string $manager_type, string $method) {
    $model = ucfirst(strtolower($manager_type)) . '_manager_model';
    if (class_exists($model)) {
      $model = strtolower($model);
      if (isset($this->$model)) {
        if (method_exists($this->$model, $method)) {
          $this->manager = $this->$model;
          $result = $this->$model->$method();
          $result = is_array($result) ? array("data_" . $method => $result) : array("data_" . $method => array($result));
          $this->data = array_merge($this->data, $result);
          $views = $this->view->get('view');
          $views = is_array($views) ? $views : array($views);
          $this->view->set('view', array_merge($views, $this->$model->get('format')->load_views()));
          //TODO : pseudo API when url got manager method and args
          if (count($this->uri->segments) == 7 && $this->uri->segment(5) == 'manager')
            print_r(json_encode($result));
          return $result;
        }
      }
    }
    return false;
  }
}
