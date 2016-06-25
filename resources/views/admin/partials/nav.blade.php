<nav class="navbar navbar-inverse navbar-fixed-top">
	  	<div class="container-fluid">
			<div class="navbar-header">
		      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        	<span class="sr-only">Toggle navigation</span>
		        	<span class="icon-bar"></span>
		        	<span class="icon-bar"></span>
		        	<span class="icon-bar"></span>
		      	</button>
		      	<a class="navbar-brand" href="{{ url('/admin/main') }}">
		      		<i class="fa fa-home fa-lg" aria-hidden="true"></i> Principal
		      	</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

		      	<ul class="nav navbar-nav navbar-right">

		      	<li>
		      		<a href="#">
		      			<i class="fa fa-bell" aria-hidden="true"></i> 
		      			<span style="background: red;" class="badge"> 2 </span>
		      		</a>
		      	</li>
		      	<li>
		      		<a href="#">
		      			<i class="fa fa-comments" aria-hidden="true"></i>
		      			<span style="background: red;" class="badge"> 1 </span>
		      		</a>
		      	</li>



		        <!-- 	<li class="dropdown">
			          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">  <i style="color: red;" class="fa fa-bell" aria-hidden="true"></i>&nbsp;<span class="caret"></span></a>
			          	<ul class="dropdown-menu">
			            	<li><a href="#">Action</a></li>
			            	<li><a href="#">Another action</a></li>
			            	<li><a href="#">Something else here</a></li>
			            	<li role="separator" class="divider"></li>
			            	<li><a href="#">Separated link</a></li>
			          	</ul>
			        </li>

		        	<li class="dropdown">
			          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-comments" aria-hidden="true"></i> &nbsp;<span class="caret"></span></a>
			          	<ul class="dropdown-menu">
			            	<div style="padding: 10px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			            	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			            	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			            	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			            	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			            	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
			          	</ul>
			        </li> -->


		        	<li class="dropdown">
			          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user" aria-hidden="true"></i>&nbsp; {{ Auth::user()->name }}<span class="caret"></span></a>
			          	<ul class="dropdown-menu">
			            	<li><a data-toggle="modal" data-target="#modalCambiarContrasena" href="">Cambiar Contraseña</a></li>
			            	<li role="separator" class="divider"></li>
			            	<li><a href="{{ url('/logOut') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Salir</a></li>
			          	</ul>
			        </li>
		      	</ul>
		    </div><!-- /.navbar-collapse -->
	  	</div>
	</nav>	

<div class="row" id="body-content">