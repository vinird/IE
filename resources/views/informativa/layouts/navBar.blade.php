<nav id="main-navbar" class="navbar navbar-default navbar-inverse">
  	<div class="container">
		<div class="col-xs-2 hidden-sm hidden-md hidden-lg">
			<a class="navbar-brand " href="{{ route('/') }}">IE</a>
		</div>	
		<div class="hidden-sm hidden-md hidden-lg col-xs-2 col-xs-offset-8" style="overflow: hidden;">
			<div id="menu-icon-wrapper2" class="menu-icon-wrapper navbar-header" style="visibility: hidden;">
				<button id="menu-icon-trigger2" class="menu-icon-trigger collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<svg width="1000px" height="1000px">
						<path id="pathD" d="M 300 400 L 700 400 C 900 400 900 750 600 850 A 400 400 0 0 1 200 200 L 800 800"></path>
						<path id="pathE" d="M 300 500 L 700 500"></path>
						<path id="pathF" d="M 700 600 L 300 600 C 100 600 100 200 400 150 A 400 380 0 1 1 200 800 L 800 200"></path>
					</svg>
				</button>
			</div><!-- menu-icon-wrapper -->
		</div>
		<div class="navbar-header">
			<a class="navbar-brand hidden-xs" href="{{ route('/') }}">IE</a>
		</div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      	<ul class="nav navbar-nav ">
		        <li class="@if(isset($homeActive))  {{ 'active' }}  @endif"><a href="{{ route('/') }}">Inicio <span class="sr-only">(current)</span></a></li>
	    	    <li class="@if(isset($noticiasActive))  {{ 'active' }}  @endif"><a href="{{ route('noticias') }}">Noticias</a></li>
	    	    <li class="@if(isset($eventosActive))  {{ 'active' }}  @endif"><a href="{{ route('eventos') }}">Eventos</a></li>
	    	    <li class="@if(isset($ubicacionActive))  {{ 'active' }}  @endif"><a href="{{ route('ubicacion') }}">Ubicación</a></li>
	      	</ul>
	      	<ul class="nav navbar-nav navbar-right">
	        	<li class="@if(isset($contactosActive))  {{ 'active' }}  @endif"><a href="{{ route('contactos') }}">Contacto</a></li>
	      	</ul>
    	</div><!-- /.navbar-collapse -->
  	</div><!-- /.container-fluid -->
</nav>

<div class="container">
	<div class="row">
		<div class="col-xs-12 ">
			<img id="img-logo-ucr" class="img-responsive center-block" src="img/img_include/ucr-logo.png">
		</div>
	</div>
</div>