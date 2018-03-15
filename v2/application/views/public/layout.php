<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo '<!DOCTYPE html>';
echo '<html>';
// print final string representing partial views
	$layout->echo('head');
	$layout->echo('body');

echo '</html>';
