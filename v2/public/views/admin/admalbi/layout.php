<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* layout.php view file is the main file which print head and body partial views
* themself print other partial views
*
* layout attribute has been set from Render library class once called by Render::render() method
*
* @date 2018-03-14
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see Render, Template, Layout renderer library classes for more infos
*/

echo '<!DOCTYPE html>'.PHP_EOL;
echo '<html>'.PHP_EOL;


$layout->echo('head');
$layout->echo('body');

echo '</html>'.PHP_EOL;
