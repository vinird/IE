@include('admin.partials.head')
@include('admin.partials.nav')
	@include('admin.partials.aside')
<?php $contadorN = Auth::user()->notification; ?>
 <!-- contenedor principal -->
<div class="col-xs-12 col-sm-9 col-md-10 col-xl-11" id="main-container" ng-app="App" ng-controller="mainController" ng-init="acuerdos= {{$acuerdos}}; users={{ $users }}">
	<div class="rowContainerAdmin">
		<!-- panel usuario  -->
		<div class="clearfix"></div>
		<br>
		<div class="col-xs-12 col-md-12 col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading p8"> 
					<h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp; {{ Auth::user()->name }} /
					@if(isset($sedes) && isset(Auth::user()->sede_id))
						@foreach($sedes as $x)
							@if($x->id == Auth::user()->sede_id)
								{!! $x->name !!}
							@endif
						@endforeach
					@endif
					</h4>  
				</div>
				
				<!-- fin modificar usuario -->
			  	<div class="panel-body panelUserImgMain" >
			  		<div class="col-xs-4 col-lg-3 col-xl-2 panelUserImg">
			  			@if(Auth::user()->img == null)
							<a data-toggle="modal" data-target="#modalModificarImgUser"><i class="fa fa-picture-o fa-5x img-responsive" aria-hidden="true"></i></a>
						@else 
							<a data-toggle="modal" data-target="#modalModificarImgUser"><img src="{{ asset('img/users/'.Auth::user()->img) }}" class="img-responsive img-circle"></a>
						@endif
			  		</div> 
			  		<div class="col-xs-8 col-lg-9 col-xl-10">
			  			{!! Form::open( ['route' => ['users.update', Auth::user()->id] , 'class' => 'form-horizontal'] ) !!}
			  				<input type="hidden" name="_method" value="PUT">
			  				<br><br>
						  	<div class="form-group">
						  		{!! Form::label('email', 'Email: ', array('class' => 'col-sm-3 control-label')); !!}
						    	<div class="col-sm-9">
						    		{!! Form::email('email', Auth::user()->email , ['class' => 'form-control search']) !!}
						    	</div>
						  	</div>
						  	<div class="form-group">
						  		{!! Form::label('name', 'Nombre: ', array('class' => 'col-sm-3 control-label')); !!}
							    <div class="col-sm-9">
						    		{!! Form::text('name', Auth::user()->name , ['class' => 'form-control search']) !!}
						    	</div>
						  	</div>
						  	<div class="form-group">
						  		{!! Form::label('phone', 'Teléfono: ', array('class' => 'col-sm-3 control-label')); !!}
							    <div class="col-sm-9">
							    	<input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control search" placeholder="0000-00-00" pattern="\d{4}[\-]\d{2}[\-]\d{2}" title="El formato correctos es: 8888-88-88" required>
						    	</div>
						  	</div>
						  	<div class="form-group"> 
						  		{!! Form::label('sede', 'Sede: ', array('class' => 'col-sm-3 control-label')); !!}
							    <div class="col-sm-9">
							      	<select name="sede" class="form-control">
							      		@if(isset($sedes))
											@foreach($sedes as $x) 
												<option value="{{$x->id}}">{!! $x->name !!}</option>
											@endforeach
							      		@endif
							      	</select>
							    </div>
							</div>
				      		<br>
							<br>
							<br>
				      		<div class="form-group">
						  		{!! Form::label('password', 'Password: ', array('class' => 'col-sm-3 control-label')); !!}
							    <div class="col-sm-9">
						    		{!! Form::password('password' , ['class' => 'form-control search', 'required']) !!}
							   		<p class="help-block">Confirme su contraseña para realizar los cambios.</p>
						    	</div>
						  	</div>
				      		<div class="form-group">
				        		<button type="submit" class="btn btn-warning btn-xs pull-right"><i class="fa fa-pencil" aria-hidden="true"></i> Modificar</button>
				      		</div>
						{!! Form::close() !!}
			  		</div> 
				 	</div>
			</div>
		</div>
		<!-- panel  notificaciones -->
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading p8"> <h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-bell" aria-hidden="true"></i>&nbsp;&nbsp; Notificaciones </h4>  </div>
				<br>
			  	<div class="panel-body panelNotificacionesAdmin" >
			  		<!-- /// -->
			  		@if(isset($notifications))
			  			@foreach($notifications as $n)
			  				@if($contadorN > 0)
								<div class="panel panel-default animated pulse animated-3 ">
									<div class="panel-heading p2"> 
								<?php $contadorN = $contadorN - 1; ?>
			  				@else
			  					<div class="panel panel-default">
			  						<div class="panel-heading pBackground"> 
			  				@endif
									<strong>{{ $n->title }} </strong>  
									<p>&nbsp;&nbsp; {{ $n->content }}</p>
									<h6><i class="fa fa-calendar-o" aria-hidden="true"></i> &nbsp;&nbsp;{{$n->created_at}} <br>
									<i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp; 
									@if(isset($users))
										@foreach($users as $u)
											@if($u->id == $n->user_id)
												{{ $u->name }}
											@endif
										@endforeach
									@endif
									</h6>
								</div>
							</div>
						<!-- /// -->
			  			@endforeach
			  		@endif
			 	</div>
			 	<br>
			</div>
		</div>
		<!-- panel  conversaciones -->
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading p8"> <h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-comments" aria-hidden="true"></i>&nbsp;&nbsp; Conversaciones </h4>  </div>
				<br>
				<div class="panel-body panelConversacionesAdmin" >
					<!-- /// -->
			  		<a data-toggle="modal" data-target="#modalVerMensaje">
						<div class="conversacionesList col-xs-12 animated swing animated-1 newNotification">
							<div class="col-xs-4 col-lg-3 ">
								<img src="{{ asset('img/users/494461-diving-funny-faces.jpg') }}" class="img-responsive img-circle">							  		
							</div>
							<div class="col-xs-8 col-lg-9">
								<strong>Nombre de usuario</strong><br>
								<em>Lorem ipsum dolor sit amet...</em>
							</div>
						</div>
					</a>
					<!-- /// -->
					<!-- /// -->
			  		<a data-toggle="modal" data-target="#modalVerMensaje">
						<div class="conversacionesList col-xs-12">
							<div class="col-xs-4 col-lg-3">
								<img src="{{ asset('img/users/494461-diving-funny-faces.jpg') }}" class="img-responsive img-circle">							  		
							</div>
							<div class="col-xs-8 col-lg-9">
								<strong>Nombre de usuario</strong><br>
								<em>Lorem ipsum dolor sit amet...</em>
							</div>
						</div>
					</a>
					<!-- /// -->
					<!-- /// -->
			  		<a data-toggle="modal" data-target="#modalVerMensaje">
						<div class="conversacionesList col-xs-12">
							<div class="col-xs-4 col-lg-3">
								<img src="{{ asset('img/users/494461-diving-funny-faces.jpg') }}" class="img-responsive img-circle">							  		
							</div>
							<div class="col-xs-8 col-lg-9">
								<strong>Nombre de usuario</strong><br>
								<em>Lorem ipsum dolor sit amet...</em>
							</div>
						</div>
					</a>
					<!-- /// -->
					<!-- /// -->
			  		<a data-toggle="modal" data-target="#modalVerMensaje">
						<div class="conversacionesList col-xs-12">
							<div class="col-xs-4 col-lg-3">
								<img src="{{ asset('img/users/494461-diving-funny-faces.jpg') }}" class="img-responsive img-circle">							  		
							</div>
							<div class="col-xs-8 col-lg-9">
								<strong>Nombre de usuario</strong><br>
								<em>Lorem ipsum dolor sit amet...</em>
							</div>
						</div>
					</a>
					<!-- /// -->
					<!-- /// -->
			  		<a data-toggle="modal" data-target="#modalVerMensaje">
						<div class="conversacionesList col-xs-12">
							<div class="col-xs-4 col-lg-3">
								<img src="{{ asset('img/users/494461-diving-funny-faces.jpg') }}" class="img-responsive img-circle">							  		
							</div>
							<div class="col-xs-8 col-lg-9">
								<strong>Nombre de usuario</strong><br>
								<em>Lorem ipsum dolor sit amet...</em>
							</div>
						</div>
					</a>
					<!-- /// -->
					<!-- /// -->
			  		<a data-toggle="modal" data-target="#modalVerMensaje">
						<div class="conversacionesList col-xs-12">
							<div class="col-xs-4 col-lg-3">
								<img src="{{ asset('img/users/494461-diving-funny-faces.jpg') }}" class="img-responsive img-circle">							  		
							</div>
							<div class="col-xs-8 col-lg-9">
								<strong>Nombre de usuario</strong><br>
								<em>Lorem ipsum dolor sit amet...</em>
							</div>
						</div>
					</a>
					<!-- /// -->
					<!-- /// -->
			  		<a data-toggle="modal" data-target="#modalVerMensaje">
						<div class="conversacionesList col-xs-12">
							<div class="col-xs-4 col-lg-3">
								<img src="{{ asset('img/users/494461-diving-funny-faces.jpg') }}" class="img-responsive img-circle">							  		
							</div>
							<div class="col-xs-8 col-lg-9">
								<strong>Nombre de usuario</strong><br>
								<em>Lorem ipsum dolor sit amet...</em>
							</div>
						</div>
					</a>
					<!-- /// -->
					
			 	</div>
				<br>
			</div>
		</div>
	</div>
	
			<!-- panel acuerdos generales -->
		<div class="col-xs-12 acuerdosGenerales">
			<div class="panel panel-default">
				<div class="panel-heading p0"> 
					<h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check-square" aria-hidden="true">
						</i>&nbsp;&nbsp; Acuerdos <!-- <a class="pull-right white btnAddAcuerdoToogle"><i class="fa fa-plus-circle fa-lg " id="btnAddUsersToogle" aria-hidden="true" data-toggle="collapse" data-target="#collapseAgregarArchivo" aria-expanded="false" aria-controls="collapseExample"></i></a>&nbsp;&nbsp;&nbsp;&nbsp; --> 
					</h4> 
				</div>

				<!-- Mostrar acuerdos -->
			  	<div class="panel-body" >
			  		<input type="search" class="form-control" placeholder="Buscar acuerdos..." ng-model="filterAcuerdo"></input>
			  		<!-- /// -->
			  		<div ng-repeat="x in acuerdos |  orderBy : 'agreement_date' | filter : filterAcuerdo" ng-if="x.complete != 1">
				  		<div class="col-xs-12 col-sm-6" >
							<div class="panel panel-default boxAcuerdos">
								<div ng-if="dateConverted(x.agreement_date) < today" class="panel-heading  pAcuerdos p"> 
									<h4>
										@{{x.title}} 
									</h4>   
									<h5>Próxima revisión <span> @{{x.agreement_date}} </span></h5>
								</div>
								<div ng-if="dateConverted(x.agreement_date) >= today && dateConverted(x.agreement_date) < (today + ((24*60*60)*4000 ))" class="panel-heading  pAcuerdos p7"> 
									<h4>
										@{{x.title}} 
									</h4>   
									<h5 class="passDate animated flash">Próxima revisión <span>@{{x.agreement_date}} </span></h5>
								</div>
								<div ng-if="dateConverted(x.agreement_date) >= (today + ((24*60*60)*4000 ))" class="panel-heading  pAcuerdos p4"> 
									<h4>
										@{{x.title}} 
									</h4>   
									<h5 >Próxima revisión <span>@{{x.agreement_date}} </span></h5>
								</div>
							  	<div class="panel-body text-justify" >
							  		<p> @{{ x.content }} </p>
							  		<br>
								  		<div ng-if="x.primaryUser_id != null">
								  			<h6>Asignado a:</h6>
								  			<div ng-repeat="u in users" ng-if="u.id == x.primaryUser_id"><em>@{{ u.name }}</em></div>
								  		</div>
								  		<br>
								  		<div ng-if="x.file_url != null">
								  			<h6>Documento del acuerdo</h6>
								  			<a href="/file/getAcuerdos/@{{ x.file_url }}">@{{ x.file_url }}</a>
								  		</div>
								  		<br>
							 	</div>
							 	<div class="panel-footer p0 pAcuerdos" >
									<div ng-repeat="u in users" ng-if="u.id == x.mainUser_id">Creado por: <em>@{{u.name}}</em></div>
								</div>
							</div>
						</div>
						<!-- <div ng-if="$even" class="clearfix"></div> -->
					</div>
					<!-- /// --> 
			 	</div>
			</div>
		</div>
			<!-- Modal Agregar imagen -->
		<div class="modal fade" id="modalModificarImgUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header text-center">
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        		<h4 class="modal-title" id="myModalLabel">
		        			@if(Auth::user()->img == null)
								Agregar imagen de perfil
		        			@else 
		        				Cambiar Imagen de perfil
		        			@endif
		        		</h4>
		      		</div>
		      	<!-- inicia el formulario -->
		        {!!Form::open(array('route'=>'users.modifyIMG','method'=>'POST', 'files'=>true , 'class' => 'form-horizontal'))!!}
		      		<div class="modal-body">
					  	<div class="form-group">
				    	<label for="imgUsers" class="col-sm-2 control-label">Imagen:</label>
					    	<div class="col-sm-10">
					    		<input type="hidden" name="MAX_FILE_SIZE" value="1999999"> 
					      		<input type="file" class="form-control" name="imgUsers" required >
							   	<p class="help-block">El tamaño de la imagen debe ser menor a 2M.</p>
					    	</div>
					  	</div>
		      		</div>
		      		<br>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
		        		@if(Auth::user()->img == null)
			        		<button type="submit" class="btn btn-success btn-sm">Agregar</button>
	        			@else 
		        			<button type="submit" class="btn btn-warning btn-sm">Modificar</button>
		        		@endif
		      		</div>
				</form>
				<!-- termina el formulario -->
		    </div>
		  </div>
		</div>
		<!-- Modal ver mensaje -->
		<div class="modal fade" id="modalVerMensaje" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog" role="document">
		  	<form class="form-horizontal">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        		<strong>Nombre de usuario</strong>
		        		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		        		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		        		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
		      		</div>
		      	<div class="modal-body text-center">
		      		<br>
		      		<div class="form-group">
					   	<label for="message" class="col-sm-2 text-danger control-label">Respuesta:</label>
					   	<div class="col-sm-10">
					   		<textarea class="form-control" name="message"></textarea>
					   	</div>
					</div>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
		        	<button type="button" class="btn btn-success btn-sm">Enviar</button>
		      	</div>
		    </div>
		    </form>
		  </div>
		</div>
		<!-- fin modal -->
		
		<!-- Modal Eliminar -->
	</div>
</div>
</div>

<script src="{{ asset('js/adminScripts/mainController.js') }}"></script>

@include('admin.partials.footer')