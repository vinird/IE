<!DOCTYPE html>
<html ng-app="App" lang="es">
<head>

	<title>Home</title>
	@include('informativa.layouts.headContent')

	<!-- slider -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/css_resource/uikit/uikit.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/css_resource/uikit/components/slideshow.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/css_resource/uikit/components/slidenav.min.css') }}">
	<script src="{{ asset('js/js_resources/uikit/uikit.min.js') }}"></script>
	<script src="{{ asset('js/js_resources/uikit/components/slideshow.min.js') }}"></script>
	<script src="{{ asset('js/js_resources/uikit/components/slideshow-fx.min.js') }}"></script>
	<!-- end slider -->
	<script src="{{ asset('js/cicles_angular.js') }}"></script>


</head>
<body class="">
<!--/////////// navbar ////////////////-->

@include('informativa.layouts.navBar')
<div class="container">
	<div class="row text-center nav-modify">
		<div class="col-xs-12 col-sm-2 col-nav-modify">
			<a id="enlace-panel-1" class="enlace-panel"><strong>Ficha profesiográfica</strong></a>
		</div>
		<div class="col-xs-12 col-sm-2 col-nav-modify">
			<a id="enlace-panel-2" class="enlace-panel"><strong>Plan de estudio</strong></a>
		</div>
		<div class="col-xs-12 col-sm-2 col-nav-modify">
			<a id="enlace-panel-3" class="enlace-panel"><strong>Habilidades Deseables</strong></a>
		</div>
		<div class="col-xs-12 col-sm-2 col-nav-modify">
			<a id="enlace-panel-4" class="enlace-panel"><strong>Tareas del Estudiante</strong></a>
		</div>
		<div class="col-xs-12 col-sm-2 col-nav-modify">
			<a id="enlace-panel-5" class="enlace-panel"><strong>Perfil Profesional</strong></a>
		</div>
		<div class="col-xs-12 col-sm-2 col-nav-modify">
			<a id="enlace-panel-6" class="enlace-panel"><strong>Mercado Laboral</strong></a>
		</div>
	</div>
</div>
<!--//////// Body ///////////-->
<!-- slider -->
	<div class="uk-slidenav-position" data-uk-slideshow>
    <ul class="uk-slideshow">
        <li><img width="1800" height="500" alt="img" src="{{ asset('img/img_include/noticias/informatica.jpg') }}"></li>
        <li><img width="1800" height="500" alt="img" src="{{ asset('img/img_include/noticias/noticia_1457.jpg') }}"></li>
    </ul>
    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
</div>
<!-- end slider -->

<div class="container ie-title">
	<br>
	<div class="row section-0">
		<div class="col-xs-12 text-center ">
			<h3>INFORMÁTICA EMPRESARIAL
				@if(Auth::check())
					Esta logeado
				@else
					No esta logeado
				@endif
			</h3>
		</div>
	</div>
</div>

<div id="panel1" class="container-fuid" style="background-color: #83A1B4">
	<br><br>
	<div class="container">
		<div class="row section-1">
			<div class="col-xs-12 col-sm-4 text-center lg-font hidden-xs" style="height: 47px;">
				<i class="fa fa-file-text-o" aria-hidden="true"></i>
			</div>
			<div class="col-xs-12 col-sm-4 text-center lg-font hidden-sm hidden-md hidden-lg " >
				<i class="fa fa-file-text-o" aria-hidden="true"></i>
			</div>
			<div class="col-sx-12 col-sm-8">
				<h3>Ficha profesiográfica</h3>
				<p class="text-justify">La carrera de Bachillerato en Informática empresarial forma profesionales con capacidad para el desarrollo y la administración de proyectos informáticos tendientes a organizar sistemas, recursos y finanzas en la empresa, al optimizar el  acceso, la sistematización y la organización de la información. Es una carrera que se ofrece sólo en sedes regionales.</p> <a href=""> DESCARGAR FICHA <i class="fa fa-download" aria-hidden="true"></i></a> 
				<div class="divider-lg"></div>
			</div>
		</div>
	</div>
</div>

<div id="panel2" class="container-fluid" style="background-color: #83A1B4" ng-controller="CtrlTable">
	<div class="container">
		<div class="row section-2">
			<div class="col-xs-12 col-sm-4 text-center lg-font hidden-sm hidden-md hidden-lg" >
				<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
			</div>
			<div class="col-sx-12 col-sm-8">
				<h3>Plan de estudio</h3>
				<table class="table table-condensed" >
					<thead>
						<tr>
							<th class="hidden-xs">Sigla</th>
							<th>Curso</th>
							<th class="text-center">Créditos</th>
							<th>Requisitos</th>
							<th class="hidden-xs">Correquisitos</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="x in cursos">
							<td class="hidden-xs">@{{ x.sigla }}</td>
							<td>@{{ x.curso }}</td>
							<td class="text-center">@{{ x.creditos }}</td>
							<td>@{{ x.requisitos }}</td>
							<td class="hidden-xs">@{{ x.correquisitos }}</td>
						</tr>
					</tbody>
				</table>
				<nav>
				  	<ul class="pager">
				    	<li><a id="pager-option-1" class="pager-option-" ng-click="loadCicle(1)">l Ciclo</a></li>
				    	<li><a id="pager-option-2" class="pager-option-" ng-click="loadCicle(2)">ll Ciclo</a></li>
				    	<li><a id="pager-option-3" class="pager-option-" ng-click="loadCicle(3)">lll Ciclo</a></li>
				    	<li><a id="pager-option-4" class="pager-option-" ng-click="loadCicle(4)">lV Ciclo</a></li>
				    	<li><a id="pager-option-5" class="pager-option-" ng-click="loadCicle(5)">V Ciclo</a></li>
				    	<li><a id="pager-option-6" class="pager-option-" ng-click="loadCicle(6)">Vl Ciclo</a></li>
				    	<li><a id="pager-option-7" class="pager-option-" ng-click="loadCicle(7)">Vll Ciclo</a></li>
				    	<li><a id="pager-option-8" class="pager-option-" ng-click="loadCicle(8)">Vlll Ciclo</a></li>
				  	</ul>
				</nav>
				<div class="divider-lg"></div>
			</div>
			<div class="col-xs-12 col-sm-4 text-center lg-font hidden-xs" style="height: 315px;">
				<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
			</div>
		</div>
	</div>
</div>

<div id="panel3" class="container-fluid" style="background-color: #83A1B4">
	<div class="container">
		<div class="row section-3">
			<div class="col-xs-12 col-sm-4 text-center lg-font hidden-xs" style="height: 487px;">
				<i class="fa fa-asterisk" aria-hidden="true"></i>
			</div>
			<div class="col-xs-12 col-sm-4 text-center lg-font hidden-sm hidden-md hidden-lg" style="padding-top: 0.5em;">
				<i class="fa fa-asterisk" aria-hidden="true"></i>

			</div>
			<div class="col-sx-12 col-sm-8">
				<h3>Habilidades y Características Deseables</h3>
				<p class="text-justify">
					<ul class="text-justify">
						<li>Facilidad para el trabajo con material cuantitativo, en especial para el razonamiento lógico matemático</li>
						<li>Interés por los continuos cambios en las tecnologías de la información</li>
						<li>Facilidad para comunicar a otros información técnica</li>
						<li>Seguro de sí mismo, con iniciativa y dispuesto a tomar decisiones ante los retos que se le presenten</li>
						<li>Disposición para el trabajo en grupo y cualidades de liderazgo que permitan crear un ambiente adecuado para el logro de las metas propuestas</li>
						<li>Interés por comprender las diversas labores que se realizan en las empresas: dirección, producción, finanzas, mercadeo, etc.</li>
						<li>Sensibilidad social y facilidad para la comunicación oral y escrita</li>
						<li>Debe ser capaz de:</li>
						<li>Construir algoritmos</li>
						<li>Implementar los algoritmos en lenguajes de programación</li>
						<li>Realizar pruebas a los programas</li>
						<li>Dar mantenimiento a los programas</li>
						<li>Documentar programas</li>
						<li>Seleccionar estructuras de datos adecuadas. Seleccionar la metodología de programación adecuada</li>
						<li>Diseñar interfaces eficientes</li>
						<li>Diseñar sistemas</li>
						<li>Implementar sistemas</li>
						<li>Administrar proyectos informáticos</li>
						<li>Auditar sistemas computacionales</li>
					</ul>
				</p>
				<div class="divider-lg"></div>
			</div>
		</div>
	</div>
	<br><br>
</div>

<div id="panel4" class="container-fluid" style=" background-color: #F2E9C1;">
	<br><br>
	<div class="container">
		<div class="row section-4">
			<div class="col-xs-12 col-sm-4 text-center lg-font hidden-sm hidden-md hidden-lg">
				<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
			</div>
			<div class="col-sx-12 col-sm-8">
				<h3>Tareas Típicas del Estudiante Durante la Carrera</h3>
				<p class="text-justify">
					<ul class="text-justify">
						<li>Adquisición de conocimientos para el análisis cuantitativo en áreas como cálculo, algebra, estructuras discretas, análisis numérico, investigación de operaciones, probabilidad, estadística, economía y finanzas</li>
						<li>Desarrollo de sistemas de información al trabajar en todas las etapas del proceso: planificación, diseño, programación y pruebas</li>
						<li>Análisis de modelos informáticos aplicables a las actividades de las empresas</li>
						<li>Prácticas de administración de los recursos informáticos: sistemas operativos, redes, bases de datos, usuarios, desarrolladores, otros</li>
						<li>Participación en trabajos de investigación, prácticas en empresas y trabajo comunal universitario</li>
					</ul>
				</p>
				<div class="divider-lg"></div>
			</div>
			<div class="col-xs-12 col-sm-4 text-center lg-font hidden-xs" style="height: 227px;">
				<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
			</div>
		</div>
	</div>
	<br><br>
</div>

<div id="panel5" class="container-fluid" style=" background-color: #B3B6B8;">
	<br><br>
	<div class="container">
		<div class="row section-5">
			<div class="col-xs-12 col-sm-4 text-center lg-font hidden-xs" style="height: 287px;">
				<i class="fa fa-graduation-cap" aria-hidden="true"></i>
			</div>
			<div class="col-xs-12 col-sm-4 text-center lg-font hidden-sm hidden-md hidden-lg" >
				<i class="fa fa-graduation-cap" aria-hidden="true"></i>
			</div>
			<div class="col-sx-12 col-sm-8">
				<h3>Perfil Profesional</h3>
				<p class="text-justify">La formación del informático empresarial se construye a partir de tres áreas de conocimiento: la computación, la informática y la administración, con el apoyo de la matemática, la estadística y la lógica, teniendo como ejes conductores la ética y el humanismo.</p>
				<p class="text-justify">Este profesional está capacitado para analizar, diseñar y programar sistemas utilizando tecnología de punta; así como para la planificación, control y dirección de la gestión informática en la empresa o institución. Está capacitado para tomar parte activa en trabajos complejos y para dirigir investigaciones multidisciplinarias aplicadas.</p>
				<p class="text-justify">Los concomimientos en el área de administración de los recursos informáticos le permitirán mantener un mejor acercamiento a la organización e identificar la manera óptima de aplicar la informática para apoyar su funcionamiento. Estará así, en capacidad de utilizar las herramientas computacionales que le permitan modelar los procesos empresariales y ayudar en la toma de decisiones.</p>
				<div class="divider-lg"></div>
			</div>
		</div>
	</div>
</div>

<div id="panel6" class="container-fluid" style=" background-color: #B3B6B8;">
	<div class="container">
		<div class="row section-6">
			<div class="col-xs-12 col-sm-4 text-center lg-font hidden-sm hidden-md hidden-lg">
				<i class="fa fa-building-o" aria-hidden="true"></i>
			</div>
			<div class="col-sx-12 col-sm-8">
				<h3>Mercado Laboral</h3>
				<p>
					<ul>
						<li>Instituciones autónomas</li>
						<li>Gobierno central</li>
						<li>Industrias</li>
						<li>Empresas privadas</li>
						<li>Educación superior estatal y privada</li>
						<li>Oficinas dedicadas a la consultoría y servicios computacionales</li>
						<li>Proyección internacional</li>
					</ul>
				</p>
				<div class="divider-lg"></div>
			</div>
			<div class="col-xs-12 col-sm-4 text-center lg-font hidden-xs" style="height: 207px;">
				<i class="fa fa-building-o" aria-hidden="true"></i>
			</div>
		</div>
	</div>
	<br><br>
</div>

<!--//////////// footer //////////-->

@include('informativa.layouts.footer')

</body>
<script src="js/js_resources/animate_icon/main_animate_icon.js"></script>
<script type="text/javascript">
	var slideshow = UIkit.slideshow($('.uk-slidenav-position'), { 
		animation: 'scale',
		autoplay: true,
		autoplayInterval: 5000,
		pauseOnHover: false,
		height: 'auto',
		kenburns: true,

	});
</script>
</html>