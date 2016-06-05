@include('admin.partials.head')
@include('admin.partials.nav')
	@include('admin.partials.aside')
 <!-- contenedor principal -->
		<div class="col-xs-12 col-sm-9 col-md-10 col-xl-11" id="main-container">
			
				<!-- panel usuairos -->
				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading p1"> <h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp; Usuarios Activados  </h4>  </div>
					  	<div class="panel-body" >
					  		<input type="search" class="form-control" placeholder="Buscar usuario..."></input>
					  		<table class="table table-hover">
								<thead>
								  	<th>Email</th>
								  	<th>Nombre</th>
								  	<th>Teléfono</th>
								  	<th class="hidden-xs">Sede</th>
								  	<th>Estado</th>
								  	<th></th>
								 </thead>
								 <tbody>
							  		<tr>
							  			<td>Datos de entrada</td>
							  			<td >Datos de entrada</td>
							  			<td>Datos de entrada</td>
							  			<td class="hidden-xs">San Ramon</td>
							  			<td data-toggle="modal" data-target="#modalDesactivarUsuario" class="hidden-xs"><a class="btn btn-success btn-xs"><i class="fa fa-check" aria-hidden="true"></i> activo</a></td>
							  			<td>
							  				<a data-toggle="modal" data-target="#modalEliminarUsuario" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							  			</td>
							  		</tr>
							  		<tr>
							  			<td>Datos de entrada</td>
							  			<td >Datos de entrada</td>
							  			<td>Datos de entrada</td>
							  			<td class="hidden-xs">San Ramon</td>
							  			<td data-toggle="modal" data-target="#modalDesactivarUsuario" class="hidden-xs"><a class="btn btn-success btn-xs"><i class="fa fa-check" aria-hidden="true"></i> activo</a></td>
							  			<td>
							  				<a data-toggle="modal" data-target="#modalEliminarUsuario" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							  			</td>
							  		</tr>
							  		
							  	</tbody>
							</table>
					 	</div>
					</div>
				</div>

				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading p3"> <h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp; Usuarios Desactivados </h4>  </div>
					  	<div class="panel-body" >
					  		<input type="search" class="form-control" placeholder="Buscar usuario..."></input>
					  		<table class="table table-hover">
								<thead>
								  	<th>Email</th>
								  	<th>Nombre</th>
								  	<th>Teléfono</th>
								  	<th class="hidden-xs">Sede</th>
								  	<th>Estado</th>
								  	<th></th>
								 </thead>
								 <tbody>
							  		<tr>
							  			<td>Datos de entrada</td>
							  			<td >Datos de entrada</td>
							  			<td>Datos de entrada</td>
							  			<td class="hidden-xs">San Ramon</td>
							  			<td data-toggle="modal" data-target="#modalActivarUsuario"  class="hidden-xs"><a class="btn btn-default btn-xs"><i class="fa fa-ban" aria-hidden="true"></i> desactivado</a></td>
							  			<td>
							  				<a data-toggle="modal" data-target="#modalEliminarUsuario" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							  			</td>
							  		</tr>
							  		<tr>
							  			<td>Datos de entrada</td>
							  			<td >Datos de entrada</td>
							  			<td>Datos de entrada</td>
							  			<td class="hidden-xs">San Ramon</td>
							  			<td data-toggle="modal" data-target="#modalActivarUsuario"  class="hidden-xs"><a class="btn btn-default btn-xs"><i class="fa fa-ban" aria-hidden="true"></i> desactivado</a></td>
							  			<td>
							  				<a data-toggle="modal" data-target="#modalEliminarUsuario" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							  			</td>
							  		</tr>
							  		
							  	</tbody>
							</table>
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
				        		<h4>¿Desea eliminar al usuario ++NombreDeUsuario++?</h4>
				      		</div>
				      	<div class="modal-body text-center">
				      		<br>
				      		<div class="form-group">
							   	<label for="password" class="col-sm-2 text-danger control-label">Contraseña:</label>
							   	<div class="col-sm-10">
							   		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña...">
							   		<p class="help-block">Debe ingresar su contraseña para poder eliminar usuarios.</p>
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
				<!-- Modal habilitar -->
				<div class="modal fade" id="modalActivarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				  	<form class="form-horizontal">
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4>¿Desea activar el usuario ++NombreDeUsuario++?</h4>
				      		</div>
				      	<div class="modal-body text-center">
				      		<br>
				      		<div class="form-group">
							   	<label for="password" class="col-sm-2 text-danger control-label">Contraseña:</label>
							   	<div class="col-sm-10">
							   		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña...">
							   		<p class="help-block">Debe ingresar su contraseña para poder habilitar usuarios.</p>
							   	</div>
							</div>
				      	</div>
				      	<div class="modal-footer">
				        	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
				        	<button type="button" class="btn btn-success btn-sm">Activar</button>
				      	</div>
				    </div>
				    </form>
				  </div>
				</div>
				<!-- Modal habilitar -->
				<div class="modal fade" id="modalDesactivarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				  	<form class="form-horizontal">
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4>¿Desea desactivar al usuario ++NombreDeUsuario++?</h4>
				      		</div>
				      	<div class="modal-body text-center">
				      		<br>
				      		<div class="form-group">
							   	<label for="password" class="col-sm-2 text-danger control-label">Contraseña:</label>
							   	<div class="col-sm-10">
							   		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña...">
							   		<p class="help-block">Debe ingresar su contraseña para poder deshabilitar usuarios.</p>
							   	</div>
							</div>
				      	</div>
				      	<div class="modal-footer">
				        	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
				        	<button type="button" class="btn btn-default btn-sm">desactivar</button>
				      	</div>
				    </div>
				    </form>
				  </div>
				</div>
				<!-- //////// -->
		</div>
	</div>
@include('admin.partials.footer')
