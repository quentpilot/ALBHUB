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
$config['tpl_css_vendor_files'] = array(
  'bootstrap/css/bootstrap.min.css',
  'font-awesome/css/font-awesome.min.css',
  'bootstrap-select/css/bootstrap-select.min.css',
  'owl.carousel/assets/owl.carousel.css',
  'owl.carousel/assets/owl.theme.default.css',
);
$config['tpl_ttf_files'] = array();
$config['tpl_js_files'] = array('jquery.parallax-1.1.3.js', 'front.js');
$config['tpl_js_vendor_files'] = array(
  'jquery/jquery.min.js',
  'popper.js/umd/popper.min.js',
  'bootstrap/js/bootstrap.min.js',
  'jquery.cookie/jquery.cookie.js',
  'waypoints/lib/jquery.waypoints.min.js',
  'jquery.counterup/jquery.counterup.min.js',
  'owl.carousel/owl.carousel.min.js',
  'owl.carousel2.thumbs/owl.carousel2.thumbs.min.js',
  'bootstrap-select/js/bootstrap-select.min.js',
  'jquery.scrollto/jquery.scrollTo.min.js',
);

/**
* layout configs representings private data from /application/views filesystem repository
*/
$config['layout_public_path'] = 'public';
$config['layout_admin_path'] = 'admin';
$config['layout_public_parts'] = array('head', 'body', 'info_bar', 'user_modal', 'nav_menu', 'foot');
$config['layout_admin_parts'] = array('head', 'body', 'nav_menu', 'side_menu', 'foot');
