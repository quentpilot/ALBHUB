<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| AUTO-LOADER
| -------------------------------------------------------------------
| This file specifies which systems should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default. For example,
| the database is not connected to automatically since no assumption
| is made regarding whether you intend to use it.  This file lets
| you globally define which systems you would like loaded with every
| request.
|
| -------------------------------------------------------------------
| Instructions
| -------------------------------------------------------------------
|
| These are the things you can load automatically:
|
| 1. Packages
| 2. Libraries
| 3. Drivers
| 4. Helper files
| 5. Custom config files
| 6. Language files
| 7. Models
|
*/

/*
| -------------------------------------------------------------------
|  Auto-load Packages
| -------------------------------------------------------------------
| Prototype:
|
|  $autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');
|
*/
$autoload['packages'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| These are the classes located in system/libraries/ or your
| application/libraries/ directory, with the addition of the
| 'database' library, which is somewhat of a special case.
|
| Prototype:
|
|	$autoload['libraries'] = array('database', 'email', 'session');
|
| You can also supply an alternative library name to be assigned
| in the controller:
|
|	$autoload['libraries'] = array('user_agent' => 'ua');
*/
$autoload['libraries'] = array(
  // main CI libraries
  'database',
  'session',
  'parser',
  'form_validation',
  'email',
  // Haby ORM used to manage database transfers
  'tool/orm/builder/table/table_builder',
  'tool/orm/builder/table/datatype_builder',
  'tool/orm/builder/table/datacolumn_builder',
  'tool/orm/builder/table/template/layout_builder',
  'tool/orm/builder/table/template/datalayout_builder',
  'tool/orm/builder/table/table_builder',
  'tool/orm/builder/table/datatable_builder',
  'tool/orm/result/table_result',
  'tool/orm/result/datatable_result',
  'tool/orm/builder/query/queries_builder',
  'tool/orm/builder/query/dataqueries_builder',
  'tool/orm/builder/query/query_builder',
  'tool/orm/builder/query/dataquery_builder',
  'tool/orm/query/table_query',
  'tool/orm/query/datatable_query',
  'tool/orm/Orm',
  // Haby libraries used by controllers and models
  'transfert/protocol/validation/validation',
  'transfert/protocol/rules',
  'transfert/protocol/protocol',
  'transfert/parser/query_parser',
  'transfert/query/query',
  'transfert/transfert',
  'transfert/request/req',
  'transfert/response/res',
  'api/api',
  // Haby data access objects
  'dao/dao',
  // Haby libraries used to manage users
  'user/user_session',
  'user/user_infos',
  'user/connect/user_log',
  'email/email_config',
  // Haby libraries used to build items
  'category/category',
  'item/item',
  'item/item_content',
  'item/menu/menu',
  'item/menu/menu_nav',
  'item/menu/menu_side',
  'item/article/article',
  'item/widget/widget',
  'item/page/page',
  'item/item_factory',
  // Haby libraries used to manage items
  'manager/tools_manager',
  'manager/setting/setting_manager',
  'manager/setting/items/items_manager_setting',
  'manager/setting/items/pages_manager_setting',
  'manager/dao/items/items_manager_dao',
  'manager/dao/items/pages_manager_dao',
  'manager/format/items/items_manager_format',
  'manager/format/items/pages_manager_format',
  // Haby libraries used to build and display the final output
  'renderer/layout',
  'renderer/template',
  'renderer/render',
);

/*
| -------------------------------------------------------------------
|  Auto-load Drivers
| -------------------------------------------------------------------
| These classes are located in system/libraries/ or in your
| application/libraries/ directory, but are also placed inside their
| own subdirectory and they extend the CI_Driver_Library class. They
| offer multiple interchangeable driver options.
|
| Prototype:
|
|	$autoload['drivers'] = array('cache');
|
| You can also supply an alternative property name to be assigned in
| the controller:
|
|	$autoload['drivers'] = array('cache' => 'cch');
|
*/
$autoload['drivers'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['helper'] = array('url', 'file');
*/
$autoload['helper'] = array('url', 'debug', 'token');

/*
| -------------------------------------------------------------------
|  Auto-load Config files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['config'] = array('config1', 'config2');
|
| NOTE: This item is intended for use ONLY if you have created custom
| config files.  Otherwise, leave it blank.
|
*/
$autoload['config'] = array('orm', 'templates', 'transferts');

/*
| -------------------------------------------------------------------
|  Auto-load Language files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['language'] = array('lang1', 'lang2');
|
| NOTE: Do not include the "_lang" part of your file.  For example
| "codeigniter_lang.php" would be referenced as array('codeigniter');
|
*/
$autoload['language'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['model'] = array('first_model', 'second_model');
|
| You can also supply an alternative model name to be assigned
| in the controller:
|
|	$autoload['model'] = array('first_model' => 'first');
*/
$autoload['model'] = array(
  // Haby models used to manage items
  'item/item_model',
  'item/page/page_model',
  'item/article/article_model',
  'item/menu/menu_model',
  'item/widget/widget_model',
  'item/items_model',
  // Haby models used to get users infos
  'user/user_model',
  // Haby models used to manage main manager controllers for admin
  'manager/items/items_manager_model',
  'manager/items/pages_manager_model',
  'manager/items/menus_manager_model',
  'manager/items/articles_manager_model',
  'manager/items/widgets_manager_model',
  // Haby models used to manage template data
  'template/template_model',
  'landing_model',
  'pages_model',
);
