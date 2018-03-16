<?php

/**
* template configs representing public data from /assets/ filesystem repository
*/
$config['tpl_root_path'] = 'assets/templates';
$config['tpl_css_path'] = 'css';
$config['tpl_js_path'] = 'js';
$config['tpl_public_name'] = 'albi';
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
