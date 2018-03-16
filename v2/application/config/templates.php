<?php

/**
* this config file is used to set current template to use
*
* for now, to add and override template configs, copy and reset vars at the end of this file
* Templates management library will define the last config values
* In the future, new templates will be stored into database for an easy usage
*/

/**
* template configs representing public data from /assets/ filesystem repository
*/
$config['tpl_root_path'] = 'assets/templates';
$config['tpl_css_path'] = 'css';
$config['tpl_js_path'] = 'js';
$config['tpl_public_name'] = 'pw-tpl';
$config['tpl_admin_name'] = 'admalbi';
$config['tpl_css_files'] = array();
$config['tpl_ttf_files'] = array('icomoon');
$config['tpl_js_files'] = array('jquery.min.js', 'jquery.easing.1.3.js', 'bootstrap.min.js', 'jquery.waypoints.min.js', 'jquery.stellar.min.js', 'main.js');

/**
* layout configs representigs private data from /application/views filesystem repository
*/
$config['layout_public_path'] = 'public';
$config['layout_admin_path'] = 'admin';
$config['layout_public_parts'] = array('head', 'body', 'nav_menu', 'foot');
$config['layout_admin_parts'] = array('head', 'body', 'nav_menu', 'side_menu', 'foot');
