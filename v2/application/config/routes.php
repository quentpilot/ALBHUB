<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes with
| underscores in the controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'landing';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

/**
* main albi-corporate web app routes
*/
// public root methods
$route['index'] = 'landing';
$route['bienvenue'] = 'landing/bienvenue';
$route['a-propos'] = 'page/a-propos';
$route['nos-services'] = 'page/nos_services';
$route['nos-realisations'] = 'page/nos_realisations';
$route['nous-contacter'] = 'page/nous_contacter';

// public dyanamic methods
$route['nos-realisations/(:any)'] = 'page/portfolio/$1';
$route['nos-realisations/(:any)/(:any)'] = 'page/project/$1';

// admin root methods
$route['admin'] = 'admin/administrator';
$route['admin/manager/(:any)'] = 'admin/administrator/manage/$1';
$route['admin/manager/(:any)/(:any)'] = 'admin/administrator/section/$1';

/**
* Haby infos routes
*/
$route['haby/index'] = 'welcome';
$route['haby/(:any)'] = 'welcome/$1';
