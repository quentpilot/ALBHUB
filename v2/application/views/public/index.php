<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* index.php view file is the default example of a subview file called by controller
* helped by Render::render() method
*
* @date 2018-03-14
* @author Quentin Le Bian <quentin.lebian@pilotaweb.fr>
* @see Render, Template, Layout renderer library classes for more infos
*/
?>

<br>
<center>
	<h2>
		Welcome to the html index custom page
		<br>
		<small>Your content page called from your current controller and templated by <b>renderer</b> library</small>
	</h2>
	<p>
		This is a paragraph which would not help you to understand this CodeIgniter framework overlay except one thing :
		<br><br>
		- To access to dynamic data you want to print to your partial views, you have differents ways :
		<br>
		[1 : call [ My_Controller::render(view, data, return, parser)] like
		<br>
		 $this->render('index', array('my_data' => 'My data to display', false, <b>false</b>))
		<br>
		as example, would allow you to use the default PHP template engine ]
		<br><br>
		[2 : call [ My_Controller::render(view, data, return, parser)] like
		<br>
		 $this->render('index', array('my_data' => 'My data to display', false, <b>true</b>))
		<br>
		as example, would allow you to use the CodeIgniter template parser ]
		<br><br>
		[default : call [ My_Controller::render(view, data, return, parser)] like
		<br>
		 $this->render('index', array('my_data' => 'My data to display'))
		<br>
		as example, would allow you to use the CodeIgniter template parser without return partial view as string ]
		<br><br>
		The [ Render::Render(view = null, data = array(), return_output = false, load_parser = false) ] method
		<br>
		will automatically create a layout using each partial view include to the current template installed
		<br>
		and then display the final output to the client browser as a basic HTTP response
	</p>
</center>
<br>
