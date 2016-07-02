<?php $contador = Auth::user()->notification; ?>
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

	        	<li class="dropdown dropNotifications">
		          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">  
		          		<i class="fa fa-bell" aria-hidden="true"></i>
		          		@if($contador > 0)
	      					<span style="background: red;" class="badge">{!!$contador!!} </span>
		          		@endif
		          	</a>
		          	<ul class="dropdown-menu">
					@if($contador > 0)
				        <li><a href="{{ route('notification.clearNotification')}}" class="btn btn-success center-block"><i class="fa fa-check-square-o" aria-hidden="true"></i> marcar como leído</a></li>
				        <li role="separator" class="divider"></li>
				        @else
				        <li><a>No hay notificaciones</a></li>
					@endif
		            	@if(isset($notifications))
							@foreach($notifications as $n)
								@if($contador > 0)
								<li class="bg-warning"><a>
				            		<div>
				            			<strong>{!! $n->title !!}</strong>
				            			<p>{!! $n->content !!}</p>
				            			<em><i class="fa fa-calendar-o" aria-hidden="true"></i> {{$n->created_at}}</em>
				            		</div>
				            	</a></li>
				            	<li role="separator" class="divider"></li>
				            	<?php $contador = $contador - 1; ?>
				            	@endif
							@endforeach
		            	@endif
			        </ul>
		        </li>

		        <li class="dropdown">
		      		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		      			<i class="fa fa-comments" aria-hidden="true"></i> 
		      			<span style="background: red;" class="badge"> 1 </span>
		      		</a>
		      		<ul class="dropdown-menu">
			           	<span id="newMessage" class="btn btn-success btn-block btn-sm"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i> &nbsp;Nuevo mensaje</span>
			           	<li role="separator" class="divider"></li>

			           	<form style="padding: 5%; width: 300px;" class="hide" id="formMessage">
						  <div class="form-group">
							<label for="user" class="control-label">Para:</label>
						   	  	<select class="form-control" name="user">
									<option value="u" required>Michael Vinicio Rodríguez delgado</option>
									<option value="u" required>u</option>
									<option value="u" required>u</option>
					     		</select>
						  	</div>
						  	<div class="form-group">
						    	<label for="message">Mensaje:</label>
						    	<textarea class="form-control" name="message"></textarea>
						  	</div>
						  	<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp;Enviar</button>
						</form>

			           	<li role="separator" class="divider"></li>
			           	<div style="max-height: 50vh; overflow-y: scroll;">
			           		<span class="btn btn-default btn-sm btn-block"><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Marcar mensajes como leídos</span>

				           	<div style="padding: 5%; width: 300px;">
				           		<strong>title</strong>
				           		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				           		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
				           		<em>date 22-2-3</em>
				           	</div>
				           	
			           	</div>

			       	</ul>
		      	</li>
		        <li class="dropdown">
			       	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user" aria-hidden="true"></i>&nbsp; {{ Auth::user()->name }}<span class="caret"></span></a>
			       	<ul class="dropdown-menu">
			           	<li><a data-toggle="modal" data-target="#modalCambiarContrasena" href="">Cambiar Contraseña</a></li>
			           	<li role="separator" class="divider"></li>
			           	<li><a href="{{ url('/logOut') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Salir</a></li>
			       	</ul>
			    </li>
		    </ul>
		    </div>
	  	</div>
	</nav>	

<div class="row" id="body-content">