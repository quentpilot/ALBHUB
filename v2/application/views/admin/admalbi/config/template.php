<?php

/**
*  ALBI-CORPORATE TEMPLATE CONFIGS
*/

/**
* template configs representing public data from /assets/ filesystem repository
*/
$config['tpl_root_path'] = 'assets/templates';
$config['tpl_css_path'] = 'css';
$config['tpl_js_path'] = 'js';
$config['tpl_public_name'] = 'albi-corporate';
$config['tpl_admin_name'] = 'admalbi';
$config['tpl_css_files'] = array();
$config['tpl_css_vendor_files'] = array();
$config['tpl_ttf_files'] = array();
$config['tpl_js_files'] = array();
$config['tpl_js_vendor_files'] = array();

/**
* layout configs representings private data from /application/views filesystem repository
*/
$config['layout_public_path'] = 'public';
$config['layout_admin_path'] = 'admin';
$config['layout_public_parts'] = array('head', 'body', 'info_bar', 'user_modal', 'nav_menu', 'foot');
$config['layout_admin_parts'] = array('head', 'body', 'nav_menu', 'side_menu', 'page_bar', 'foot', 'alert_message');
