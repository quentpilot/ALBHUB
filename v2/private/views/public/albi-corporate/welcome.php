<div class="fh5co-hero" style="background-image: url({assets_url}/images/hero_1.jpg);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
				<div class="fh5co-intro fh5co-table-cell">
					<h1 class="text-center">{title}</h1>
					<p>
						An overlay of the CodeIgniter framework
						<br>
						For a faster and easier way to develop your web apps
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="fh5co-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
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
			</div>
			<div class="col-md-4">
				<img src="{assets_url}/images/hero_1.jpg" alt="Free HTML5 by FreeHTML5.co" class="img-responsive">
				<br>
				<img src="{assets_url}/images/hero_2.jpg" alt="Free HTML5 by FreeHTML5.co" class="img-responsive">
				<br>
				<img src="{assets_url}/images/hero_3.jpg" alt="Free HTML5 by FreeHTML5.co" class="img-responsive">
				<br>
				<img src="{assets_url}/images/hero_4.jpg" alt="Free HTML5 by FreeHTML5.co" class="img-responsive">
			</div>
		</div>
	</div>
</div>
