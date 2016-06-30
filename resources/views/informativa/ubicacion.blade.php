<!DOCTYPE html>
<html ng-app="App" lang="es">
<head>
	
	<title>Ubicación</title>
	@include('informativa.layouts.headContent')

</head>
<body class="">
<!--/////////// navbar ////////////////-->

@include('informativa.layouts.navBar')

<!--//////// Body ///////////-->

<!-- #endregion Jssor Slider End -->

<div id="map-container" class="container-fuid" style="background-color: #83A1B4" ng-controller="CtrlMap">
	<div class="container">
		<div class="row row-map">
			<a id="icon-data-toggle-map" class="col-xs-12 nav-dark-background text-center hidden-sm hidden-md hidden-lg">
		        <i class="fa fa-map fa-2x olor-white" aria-hidden="true"></i>
	      	</a>
			<div id="map-nav-section" map-nav-active="false" class="col-xs-12 nav-modify text-center hidden-sm hidden-md hidden-lg">
				@if(isset($sedes))
				@foreach($sedes as $sede)
					<div class="col-xs-12 col-sm-2 col-nav-modify">
						<a  class="loadMapC" linkM="{{$sede->link}}" nameM="{{$sede->name}}"><strong>{{$sede->name}}</strong></a>
					</div>
				@endforeach
				@endif
				<!-- <div class="col-xs-12 col-sm-2 col-nav-modify">
					<a class="map-link-guapiles"><strong>Guápiles</strong></a>
				</div>
				<div class="col-xs-12 col-sm-3 col-nav-modify">
					<a class="map-link-puntarenas"><strong>Puntarenas</strong></a>
				</div>
				<div class="col-xs-12 col-sm-2 col-nav-modify">
					<a class="map-link-limon"><strong>Limón</strong></a>
				</div>
				<div class="col-xs-12 col-sm-3 col-nav-modify">
					<a class="map-link-sanRamon"><strong>San Ramón</strong></a>
				</div>
				<div class="col-xs-12 col-sm-2 col-nav-modify">
					<a class="map-link-liberia"><strong>Liberia</strong></a>
				</div>


				<div class="col-xs-12 col-sm-2 col-nav-modify">
					<a class="map-link-paraiso"><strong>Paraíso</strong></a>
				</div>
				<div class="col-xs-12 col-sm-3 col-nav-modify">
					<a class="map-link-tacares"><strong>Tacares de Grecia</strong></a>
				</div>
				<div class="col-xs-12 col-sm-2 col-nav-modify">
					<a class="map-link-golfito"><strong>Golfito</strong></a>
				</div>
				<div class="col-xs-12 col-sm-3 col-nav-modify">
					<a class="map-link-turrialba"><strong>Turrialba</strong></a>
				</div> -->
			</div>

			<!-- <div class="col-xs-12 nav-modify text-center hidden-xs">
				<div class="col-xs-12 col-sm-3 col-nav-modify">
					<a class="map-link-paraiso"><strong>Paraíso</strong></a>
				</div>
				<div class="col-xs-12 col-sm-3 col-nav-modify">
					<a class="map-link-tacares"><strong>Tacares de Grecia</strong></a>
				</div>
				<div class="col-xs-12 col-sm-3 col-nav-modify">
					<a class="map-link-golfito"><strong>Golfito</strong></a>
				</div>
				<div class="col-xs-12 col-sm-3 col-nav-modify">
					<a class="map-link-turrialba"><strong>Turrialba</strong></a>
				</div>


				<div class="col-xs-12 col-sm-2 col-nav-modify">
					<a class="map-link-guapiles"><strong>Guápiles</strong></a>
				</div>
				<div class="col-xs-12 col-sm-3 col-nav-modify">
					<a class="map-link-puntarenas"><strong>Puntarenas</strong></a>
				</div>
				<div class="col-xs-12 col-sm-2 col-nav-modify">
					<a class="map-link-limon"><strong>Limón</strong></a>
				</div>
				<div class="col-xs-12 col-sm-3 col-nav-modify">
					<a class="map-link-sanRamon"><strong>San Ramón</strong></a>
				</div>
				<div class="col-xs-12 col-sm-2 col-nav-modify">
					<a class="map-link-liberia"><strong>Liberia</strong></a>
				</div>
			</div> -->
			<div class="col-xs-12 nav-modify text-center hidden-xs">
				@if(isset($sedes))
				@foreach($sedes as $sede)
					<div class="col-xs-12 col-sm-2 col-nav-modify">
						<a  class="loadMapC" linkM="{{$sede->link}}" ><strong>{{$sede->name}}</strong></a>
					</div>
				@endforeach
				@endif
			</div>
			<div class="container ie-title-inverse" style="background-color: #FFF;">
				<br>
				<div class="row section-0">
					<div class="col-xs-12 text-center ">
						<h3 id="map-title">Mapas de Sedes y Recintos</h3>
						<div class="divider-md"></div>
					</div>
				</div>
			</div>
			
			<div class="embed-responsive embed-responsive-16by9 frameMap">
				<iframe class="col-sx-12" id="col-map" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2013825.7107557356!2d-84.20209407349701!3d9.659381499553406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2scr!4v1461638525429" width="100%" height="70%" frameborder="0" style="border:0" allowfullscreen ></iframe>
			</div>
			
		</div>
	</div>
	<br>
	<br>
</div>

<!--//////////// footer //////////-->

@include('informativa.layouts.footer')


</body>
<script src="js/js_resources/animate_icon/main_animate_icon.js"></script>
</html>