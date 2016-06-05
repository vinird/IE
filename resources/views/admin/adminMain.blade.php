@include('admin.partials.head')
@include('admin.partials.nav')
	@include('admin.partials.aside')

	


	

 <!-- contenedor principal -->
<div class="col-xs-12 col-sm-9 col-md-10 col-xl-11" id="main-container">
	<div class="rowContainerAdmin">
		<!-- panel usuario  -->
		<div class="clearfix"></div>
		<br>
		<div class="col-xs-12 col-md-12 col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading p8"> 
					<h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp; {{ Auth::user()->name }}
					</h4>  
				</div>
				
				<!-- fin modificar usuario -->
			  	<div class="panel-body panelUserImgMain" >
			  		<div class="col-xs-4 col-lg-3 col-xl-2 panelUserImg">
			  			@if(Auth::user()->img == null)
							<a data-toggle="modal" data-target="#modalModificarImgUser"><i class="fa fa-picture-o fa-5x img-responsive" aria-hidden="true"></i></a>
						@else 
							<a data-toggle="modal" data-target="#modalModificarImgUser"><img src="{{ asset('img/users/494461-diving-funny-faces.jpg') }}" class="img-responsive img-circle"></a>
						@endif
			  		</div> 
			  		<div class="col-xs-8 col-lg-9 col-xl-10">
			  			<form class="form-horizontal">
						  	<div class="form-group">
						    	<label for="" class="col-sm-3 control-label">Email:</label>
						    	<div class="col-sm-9">
						      		<input type="email" class="form-control search" name="" value="{{ Auth::user()->email }}" disabled>
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<label for="phone" class="col-sm-3 control-label">Teléfono:</label>
							    	<div class="col-sm-9">
						    	  	<input type="text" class="form-control search" name="phone" value="{{ Auth::user()->phone }}">
						    	</div>
						  	</div>
						  	<div class="form-group"> 
							    <label for="sede" class="col-sm-3 control-label">sede:</label>
							    <div class="col-sm-9">
							      	<select class="form-control search" name="sede">
								  	<option>1</option>
									  	<option>2</option>
									  	<option>3</option>
									  	<option>4</option>
									  	<option>5</option>
									</select>
							    </div>
							</div>
						  	<div class="form-group">
						    	<label for="password" class="col-sm-3 control-label">Contraseña:</label>
						    	<div class="col-sm-9">
						    	  	<input type="password" class="form-control search" name="password">
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<label for="newPassword" class="col-sm-3 control-label text-danger">Nueva contraseña:</label>
						    	<div class="col-sm-9">
						    	  	<input type="password" class="form-control search" name="newPassword">
						    	</div>
						  	</div>
						  	<div class="form-group">
						    	<label for="confirmPassword" class="col-sm-3 control-label text-danger">Verificar contraseña:</label>
						    	<div class="col-sm-9">
						    	  	<input type="password" class="form-control search" name="confirmPassword">
						    	</div>
						  	</div>
				      		<br>
							<br>
				      		<div class="form-group">
				        		<button type="submit" class="btn btn-warning btn-xs pull-right"><i class="fa fa-pencil" aria-hidden="true"></i> Modificar</button>
				      		</div>
						</form>
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
						<div class="panel panel-default animated pulse animated-3 ">
							<div class="panel-heading p2"> 
								<strong>&nbsp;&nbsp; Se cambio etc </strong>  
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
							</div>
						</div>
					<!-- /// -->
					<!-- /// -->
						<div class="panel panel-default animated pulse animated-3">
							<div class="panel-heading p2"> 
								<strong>&nbsp;&nbsp; Se cambio etc </strong>  
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
							</div>
						</div>
					<!-- /// -->
					<!-- /// -->
						<div class="panel panel-default">
							<div class="panel-heading pBackground"> 
								<strong>&nbsp;&nbsp; Se cambio etc </strong>  
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
							</div>
						</div>
					<!-- /// -->
					<!-- /// -->
						<div class="panel panel-default">
							<div class="panel-heading pBackground"> 
								<strong>&nbsp;&nbsp; Se cambio etc </strong>  
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
							</div>
						</div>
					<!-- /// -->
					<!-- /// -->
						<div class="panel panel-default">
							<div class="panel-heading pBackground"> 
								<strong>&nbsp;&nbsp; Se cambio etc </strong>  
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
							</div>
						</div>
					<!-- /// -->
					<!-- /// -->
						<div class="panel panel-default">
							<div class="panel-heading pBackground"> 
								<strong>&nbsp;&nbsp; Se cambio etc </strong>  
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
							</div>
						</div>
					<!-- /// -->
					<!-- /// -->
						<div class="panel panel-default">
							<div class="panel-heading pBackground"> 
								<strong>&nbsp;&nbsp; Se cambio etc </strong>  
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
							</div>
						</div>
					<!-- /// -->
					<!-- /// -->
						<div class="panel panel-default">
							<div class="panel-heading pBackground"> 
								<strong>&nbsp;&nbsp; Se cambio etc </strong>  
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
							</div>
						</div>
					<!-- /// -->
					<!-- /// -->
						<div class="panel panel-default">
							<div class="panel-heading pBackground"> 
								<strong>&nbsp;&nbsp; Se cambio etc </strong>  
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
							</div>
						</div>
					<!-- /// -->
					<!-- /// -->
						<div class="panel panel-default">
							<div class="panel-heading pBackground"> 
								<strong>&nbsp;&nbsp; Se cambio etc </strong>  
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
							</div>
						</div>
					<!-- /// -->
					<!-- /// -->
						<div class="panel panel-default">
							<div class="panel-heading pBackground"> 
								<strong>&nbsp;&nbsp; Se cambio etc </strong>  
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
							</div>
						</div>
					<!-- /// -->
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
						</i>&nbsp;&nbsp; Acuerdos <a class="pull-right white btnAddAcuerdoToogle"><i class="fa fa-plus-circle fa-lg " id="btnAddUsersToogle" aria-hidden="true" data-toggle="collapse" data-target="#collapseAgregarArchivo" aria-expanded="false" aria-controls="collapseExample"></i></a>&nbsp;&nbsp;&nbsp;&nbsp; 
					</h4> 
				</div>
				<!-- Agregar acuerdo -->
				<div class="collapse row" id="collapseAgregarArchivo">
				   	 	<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
				   	 		<form class="form-horizontal">
				   	 			<div class="text-center">
				   	 				<h3>Agregar Acuerdo</h3>
				   	 			</div>
				   	 			<br>
				   	 			<div class="form-group">
							   		<label for="title" class="col-sm-2 control-label">Título: </label>
							    	<div class="col-sm-10">
							     		<input type="text" class="form-control" name="title" placeholder="Título del acuerdo...">
							   		</div>
							  	</div>
							  	<div class="form-group">
							   		<label for="contenido" class="col-sm-2 control-label">Descripción: </label>
							    	<div class="col-sm-10">
							     		<textArea type="text" class="form-control" name="contenido" ></textArea>
							   	 	</div>
							  	</div>
								<div class="form-group">
							   		<label for="date" class="col-sm-2 control-label">Fecha límite: </label>
							    	<div class="col-sm-10">
							     		<input type="date" class="form-control" name="date" placeholder="2012-12-12">
							   		</div>
							  	</div>
							  	<br>
							  	<div class="form-group">
							    	<div class="col-sm-offset-2 col-sm-10">
							      		<button type="submit" class="btn btn-primary btn-sm">Agregar</button>
							    	</div>
							    	<br><br>
							  	</div>
							</form>
				   	 	</div>
				</div>
				<!-- fin agregra acuerdo -->
			  	<div class="panel-body" >
			  		<input type="search" class="form-control" placeholder="Buscar acuerdos..."></input>
			  		<!-- /// -->
						<!-- /// -->
					<div class="col-xs-12 col-md-6">
						<div class="panel panel-default boxAcuerdos">
							<div class="panel-heading pAcuerdos"> 
								<h4>Título del acuerdo</h4>  
								<s><h5>Fecha límite <span>12/12/1222</span></h5></s>
							</div>
						  	<div class="panel-body text-justify" >
						  		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						 	</div>
						 	<div class="panel-footer p0 pAcuerdos" >
						 		<p>Creado por: <em>Usuario</em></p>
						 	</div>
						</div>
					</div>
					<!-- /// -->
					<div class="col-xs-12 col-md-6">
						<div class="panel panel-default boxAcuerdos">
							<div class="panel-heading p7 pAcuerdos"> 
								<h4>Título del acuerdo</h4>  
								<h5 class="passDate animated flash">Fecha límite <span>12/12/1222</span></h5>
							</div>
						  	<div class="panel-body text-justify" >
						  		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						 	</div>
						 	<div class="panel-footer p0 pAcuerdos" >
						 		<p>Creado por: <em>Usuario</em></p>
						 	</div>
						</div>
					</div>
					<!-- /// -->
					<!-- /// -->
					<div class="col-xs-12 col-md-6">
						<div class="panel panel-default boxAcuerdos">
							<div class="panel-heading p7 pAcuerdos"> 
								<h4>Título del acuerdo</h4>  
								<h5 class="passDate animated flash">Fecha límite <span>12/12/1222</span></h5>
							</div>
						  	<div class="panel-body text-justify" >
						  		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						 	</div>
						 	<div class="panel-footer p0 pAcuerdos" >
						 		<p>Creado por: <em>Usuario</em></p>
						 	</div>
						</div>
					</div>
					<!-- /// -->
					<div class="col-xs-12 col-md-6">
						<div class="panel panel-default boxAcuerdos">
							<div class="panel-heading p2 pAcuerdos"> 
								<h4>Título del acuerdo</h4>  
								<h5>Fecha límite <span>12/12/1222</span></h5>
							</div>
						  	<div class="panel-body text-justify" >
						  		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						 	</div>
						 	<div class="panel-footer p0 pAcuerdos" >
						 		<p>Creado por: <em>Usuario</em></p>
						 	</div>
						</div>
					</div>
					<!-- /// -->
					<div class="clearfix"></div>
					<!-- /// -->
					<div class="col-xs-12 col-md-6">
						<div class="panel panel-default boxAcuerdos">
							<div class="panel-heading p4 pAcuerdos"> 
								<h4>Título del acuerdo</h4>  
								<h5>Fecha límite <span>12/12/1222</span></h5>
							</div>
						  	<div class="panel-body text-justify" >
						  		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						 	</div>
						 	<div class="panel-footer p0 pAcuerdos" >
						 		<p>Creado por: <em>Usuario</em></p>
						 	</div>
						</div>
					</div>
					<!-- /// -->
					<div class="col-xs-12 col-md-6">
						<div class="panel panel-default boxAcuerdos">
							<div class="panel-heading p4 pAcuerdos"> 
								<h4>Título del acuerdo</h4>  
								<h5>Fecha límite <span>12/12/1222</span></h5>
							</div>
						  	<div class="panel-body text-justify" >
						  		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						 	</div>
						 	<div class="panel-footer p0 pAcuerdos" >
						 		<p>Creado por: <em>Usuario</em></p>
						 	</div>
						</div>
					</div>
					<!-- /// -->
					<div class="clearfix"></div>
					<!-- /// -->
					<div class="col-xs-12 col-md-6">
						<div class="panel panel-default boxAcuerdos">
							<div class="panel-heading p4 pAcuerdos"> 
								<h4>Título del acuerdo</h4>  
								<h5>Fecha límite <span>12/12/1222</span></h5>
							</div>
						  	<div class="panel-body text-justify" >
						  		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						 	</div>
						 	<div class="panel-footer p0 pAcuerdos" >
						 		<p>Creado por: <em>Usuario</em></p>
						 	</div>
						</div>
					</div>
					<!-- /// -->
					<div class="col-xs-12 col-md-6">
						<div class="panel panel-default boxAcuerdos">
							<div class="panel-heading p4 pAcuerdos"> 
								<h4>Título del acuerdo</h4>  
								<h5>Fecha límite <span>12/12/1222</span></h5>
							</div>
						  	<div class="panel-body text-justify" >
						  		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						 	</div>
						 	<div class="panel-footer p0 pAcuerdos" >
						 		<p>Creado por: <em>Usuario</em></p>
						 	</div>
						</div>
					</div>
					<!-- /// -->
					<!-- /// --> 
			 	</div>
			</div>
		</div>
			<!-- Modal Modificar -->
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
		        <form class="form-horizontal">
		      		<div class="modal-body">
					  	<div class="form-group">
				    	<label for="imgUsers" class="col-sm-2 control-label">Imagen:</label>
					    	<div class="col-sm-10">
					      		<input type="file" class="form-control" name="imgUsers" >
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
		<!-- fin modal finalizar -->
		<!-- Modal Eliminar -->
	</div>
</div>
</div>

@include('admin.partials.footer')