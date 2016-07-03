<?php $contador = Auth::user()->notification; ?>
<?php $contadorMensajes = Auth::user()->message; ?>
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
				            			<h6>{!! $n->content !!}</h6>
				            			<h6 maxlength="1"><em><i class="fa fa-calendar-o" aria-hidden="true"></i> {{$n->created_at}}</em></h6>
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
		      			@if(isset(Auth::user()->message))
		      				@if(Auth::user()->message > 0)
		      					<span style="background: red;" class="badge"> {{Auth::user()->message}}</span>
		      				@endif
		      			@endif
		      		</a>
		      		<ul class="dropdown-menu">
			           	<span id="newMessage" class="btn btn-success btn-block btn-sm"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i> &nbsp;Nuevo mensaje</span>

			           	<form action="{{route('mensajes.store')}}" method="post" style="padding: 5%; width: 300px;" class="hide" id="formMessage">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
						  <div class="form-group">
							<label for="user" class="control-label">Para:</label>
						   	  	<select class="form-control" name="takeBy" required>
						   	  	@if(isset($users))
						   	  		@foreach($users as $u)
						   	  			@if($u->id != Auth::user()->id)
											<option value="{{$u->id}}">{{$u->name}}</option>
						   	  			@endif
						   	  		@endforeach
						   	  	@endif
					     		</select>
						  	</div>
						  	<div class="form-group">
						    	<label for="message">Mensaje:</label>
						    	<textarea class="form-control" name="message" required></textarea>
						  	</div>
						  	<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp;Enviar</button>
						</form>

			           	<li role="separator" class="divider"></li>
							@if(isset($mensajes) && isset(Auth::user()->message))
								@if($contadorMensajes > 0)
			           			<div style="max-height: 50vh; overflow-y: scroll;">
			           			<a href="{{route('mensajes.clearMessages')}}" class="btn btn-default btn-sm btn-block"><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Marcar mensajes como leídos</a>

								@foreach($mensajes as $m)
									@if($contadorMensajes > 0)
						           		<div style="padding: 5%; width: 300px;">
						           			<strong>
						           			@if(isset($users))
						           				@foreach($users as $u)
						           					@if($u->id == $m->sendBy)
						           						{{$u->name}}
						         	  				@endif
						        	   			@endforeach
						           			@endif
						           			</strong>
						           			<p>{{ $m->message }}</p>
						           			<h6>{{ $m->created_at }}</h6>
			           						<li role="separator" class="divider"></li>
						           		</div>
						           		<?php $contadorMensajes = $contadorMensajes - 1; ?>
						           @endif
								@endforeach
			           			</div>
								@else
									<li><a>No hay mensajes</a></li>
								@endif
							@endif
				           	

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