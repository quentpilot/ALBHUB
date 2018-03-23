<?php

/**
* this config file is used to set current template to use
*
* for now, to add and override template configs, copy and reset the following vars to a config/template.php file
* of your template repository located to the main views repository.
*
* templates management library will define which template filesystem to load by
* $config['tpl_public_name'] and $config['tpl_admin_name'] vars
* each othe vars of this file will be ignored, them are only used to a functionnal partial views filesystem
*
* @date 2018-03-15
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see Render, Template, Layout library classes for an overview
*/

/**
*  ROOT TEMPLATE CONFIGS
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
$config['layout_public_parts'] = array('head', 'body', 'nav_menu', 'foot');
$config['layout_admin_parts'] = array('head', 'body', 'nav_menu', 'side_menu', 'foot');
