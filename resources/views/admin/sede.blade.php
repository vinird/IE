@include('admin.partials.head')
@include('admin.partials.nav')
	@include('admin.partials.aside')
 <!-- contenedor principal -->
		<div class="col-xs-12 col-sm-9 col-md-10 col-xl-11" id="main-container" ng-app="App" ng-controller="sedesController" ng-init="sedes = {{ $sedes }}">
			
				<!-- panel usuairos -->
				<div class="col-xs-12 col-md-8 col-xl-9">
					<div class="panel panel-default">
						<div class="panel-heading p3"> <h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp; Panel de Sedes </h4>  </div>
					  	<div class="panel-body" >
					  		<input type="search" class="form-control" placeholder="Buscar sede..."></input>
					  		<table class="table table-hover">
								<thead>
								  	<th>Nombre</th>
								  	<th>Dirección</th>
								  	<th>Teléfono</th>
								  	<th>Usuario principal</th>
								  	<th></th>
								 </thead>
								 <tbody>
							  		<tr ng-repeat=" x in sedes">
							  			<td>@{{ x.name }}</td>
							  			<td>@{{ x. }}</td> 
							  			<td>@{{ x.name }}</td>
							  			<td>@{{ x.name }}</td>
							  			<td>
							  				<a data-toggle="modal" data-target="#modalModificarUsuario" class="btn btn-xs btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>

							  				<a data-toggle="modal" data-target="#modalEliminarUsuario" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							  			</td>
							  		</tr>
							  	</tbody>
							</table>
					 	</div>
					</div>
				</div>

				<!-- panel agregar ususario -->
				<div class="col-xs-12 col-md-4 col-xl-3">
					<div class="panel panel-default">
						<div class="panel-heading p4"> <h4>&nbsp;&nbsp;&nbsp;&nbsp; Agregar Sede  </h4></div>
					  	<div class="panel-body">
					  		<!-- inicia el formulario -->
					    	<form class="">
							  	<div class="form-group">
							    	<label for="name" class>Nombre:</label>
							      	<input type="text" class="form-control" name="name">
							  	</div>
							  	<div class="form-group">
							    	<label for="address" >Dirección:</label>
							    	  	<input type="text" class="form-control" name="address">
							  	</div>
							  	<div class="form-group">
							    	<label for="phone" >Teléfono:</label>
							    	  	<input type="text" class="form-control" name="phone">
							  	</div>
							  	<div class="form-group">
							    	<label for="user" >Usuario principal:</label>
							    	  	<select class="form-control" name="user">
										  	<option>1</option>
										  	<option>2</option>
										  	<option>3</option>
										  	<option>4</option>
										  	<option>5</option>
										</select>
							  	</div>
							  	<br>
				        		<button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar</button>
						</form>
						<!-- termina formulario -->
					 	</div>
					</div>
				</div>

				<!-- Modal Modificar -->
				<div class="modal fade" id="modalModificarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4 class="modal-title" id="myModalLabel">Modificar Sede </h4>
				      		</div>
				      	<!-- inicia el formulario -->
				        <form class="form-horizontal">
				      		<div class="modal-body">
							  	<div class="form-group">
							    	<label for="name" class="col-sm-2 control-label">Nombre:</label>
							    	<div class="col-sm-10">
							      		<input type="text" class="form-control" name="name" placeholder="Nombre...">
							    	</div>
							  	</div>
							  	<div class="form-group">
							    	<label for="address" class="col-sm-2 control-label">Dirección:</label>
							    	<div class="col-sm-10">
							    	  	<input type="text" class="form-control" name="address" placeholder="Dirección...">
							    	</div>
							  	</div>
							  	<div class="form-group">
							    	<label for="phone" class="col-sm-2 control-label">Teléfono:</label>
							    	<div class="col-sm-10">
							    	  	<input type="text" class="form-control" name="phone" placeholder="Teléfono...">
							    	</div>
							  	</div>
							  	<div class="form-group">
							    	<label for="user" class="col-sm-2 control-label">Usuario principal:</label>
							    	<div class="col-sm-10">
							    	  	<select class="form-control" name="user">
										  	<option>1</option>
										  	<option>2</option>
										  	<option>3</option>
										  	<option>4</option>
										  	<option>5</option>
										</select>
							    	</div>
							  	</div>
				      		</div>
				      		<br>
				      		<div class="form-group">
							    	<label for="passwordCurrentUser" class="col-sm-2 text-danger control-label">Contraseña:</label>
							    	<div class="col-sm-10">
							      		<input type="password" class="form-control" name="passwordCurrentUser" placeholder="Digite su contraseña...">
							      		<p class="help-block">Debe ingresar su contraseña para poder modificar sedes.</p>
							    	</div>
							  	</div>
				      		<div class="modal-footer">
				        		<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
				        		<button type="submit" class="btn btn-warning btn-sm">Modificar</button>
				      		</div>
						</form>
						<!-- termina el formulario -->
				    </div>
				  </div>
				</div>
				<!-- Modal Eliminar -->
				<div class="modal fade" id="modalEliminarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				  	<form class="form-horizontal">
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4>¿Desea eliminar la sede ++NombreDeLaSede++?</h4>
				      		</div>
				      	<div class="modal-body text-center">
				      		<br>
				      		<div class="form-group">
							   	<label for="password" class="col-sm-2 text-danger control-label">Contraseña:</label>
							   	<div class="col-sm-10">
							   		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña...">
							   		<p class="help-block">Debe ingresar su contraseña para poder eliminar sedes.</p>
							   	</div>
							</div>
				      	</div>
				      	<div class="modal-footer">
				        	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
				        	<button type="button" class="btn btn-danger btn-sm">Eliminar</button>
				      	</div>
				    </div>
				    </form>
				  </div>
				</div>
		</div>
	</div>

<script src="{{ asset('js/adminScripts/sedesController.js') }}"></script>
@include('admin.partials.footer')