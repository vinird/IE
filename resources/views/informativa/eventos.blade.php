<!DOCTYPE html>
<html ng-app="App" lang="es">
<head>
	
	@include('informativa.layouts.headContentEventos')

</head>
<body class="">
<!--/////////// navbar ////////////////-->

@include('informativa.layouts.navBar')

<!--//////// Body ///////////-->


<!-- -->
<div style="background-color: #83A1B4">
	<div class="container" style="-webkit-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08);
-moz-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08);
box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); background-color: #FFF">
	<div class="row">
			<a id="icon-data-toggle-events" class="col-xs-12 col-sm-2 nav-dark-background text-center ">
				Buscar 
		        <i class="fa fa-search  color-white" aria-hidden="true"></i>
	      	</a> <br><br>
		<div id="events-nav-section" events-nav-active="false" class="col-xs-12 nav-modify text-center hide">
				<div class="col-xs-12 col-sm-2 col-nav-modify">
					<a class="events-link-toggle"><strong>Guápiles</strong></a>
				</div>
				<div class="col-xs-12 col-sm-3 col-nav-modify">
					<a class="events-link-toggle"><strong>Puntarenas</strong></a>
				</div>
				<div class="col-xs-12 col-sm-2 col-nav-modify">
					<a class="events-link-toggle"><strong>Limón</strong></a>
				</div>
				<div class="col-xs-12 col-sm-3 col-nav-modify">
					<a class="events-link-toggle"><strong>San Ramón</strong></a>
				</div>
				<div class="col-xs-12 col-sm-2 col-nav-modify">
					<a class="events-link-toggle"><strong>Liberia</strong></a>
				</div>


				<div class="col-xs-12 col-sm-2 col-nav-modify">
					<a class="events-link-toggle"><strong>Paraíso</strong></a>
				</div>
				<div class="col-xs-12 col-sm-3 col-nav-modify">
					<a class="events-link-toggle"><strong>Tacares de Grecia</strong></a>
				</div>
				<div class="col-xs-12 col-sm-2 col-nav-modify">
					<a class="events-link-toggle"><strong>Golfito</strong></a>
				</div>
				<div class="col-xs-12 col-sm-3 col-nav-modify">
					<a class="events-link-toggle"><strong>Turrialba</strong></a>
				</div>
			</div>
	</div>
	<br>
		<div class="row">
		<div class="col-xs-12">
			
			<div class="col-xs-12 col-sm-5 pull-right">
				<div id='calendar' style="padding: 1em;"></div>
			</div>
			<div class="col-xs-12 col-sm-7">
				<h3>Title Content</h3>
				
				<div class="divider-sm-color pull-left"></div>
				</h2> 
				<br>
				<img class="img-responsive img-thumbnail" src="img/img_include/people in computer lab_1.jpg">
				<br>
				<i>Fecha: 000-00-00</i>
				<p class="text-justify">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
				<a href="">Enlace externo <i class="fa fa-external-link" aria-hidden="true"></i></a>
				<br><br>
			</div>

			<div class="col-xs-12 col-sm-7">
				<h3>Title Content</h3>
				
				<div class="divider-sm-color pull-left"></div>
				</h2> 
				<br>
				<img class="img-responsive img-thumbnail" src="img/img_include/people in computer lab_1.jpg">
				<br>
				<i>Fecha: 000-00-00</i>
				<p class="text-justify">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
				<a href="">Enlace externo <i class="fa fa-external-link" aria-hidden="true"></i></a>
				<br><br>
			</div>


			<div class="col-xs-12 col-sm-7">
				<h3>Title Content</h3>
				
				<div class="divider-sm-color pull-left"></div>
				</h2> 
				<br>
				<img class="img-responsive img-thumbnail" src="img/img_include/people in computer lab_1.jpg">
				<br>
				<i>Fecha: 000-00-00</i>
				<p class="text-justify">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
				<a href="">Enlace externo <i class="fa fa-external-link" aria-hidden="true"></i></a>
				<br><br>
			</div>
		</div>
		</div>
	</div>
</div>

<!--//////////// footer //////////-->

@include('informativa.layouts.footer')


</body>
<script src="js/js_resources/animate_icon/main_animate_icon.js"></script>
</html>