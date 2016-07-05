@include('admin.partials.head')
@include('admin.partials.nav')
	@include('admin.partials.aside')
 <!-- contenedor principal -->
		<div class="col-xs-12 col-sm-9 col-md-10 col-xl-11" id="main-container" ng-App="App" ng-controller="userController" ng-init="users={{ $users }}; sedes={{ $sedes }}">
			
				<!-- panel usuairos -->
				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading p1"> <h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp; Usuarios Activados </h4>  </div>
					  	<div class="panel-body" >
					  		<input ng-model="searchUserActive" type="search" class="form-control" placeholder="Buscar usuario..."></input>
					  		<br>
					  		<table class="table table-hover">
								<thead>
								  	<th class="hidden-xs" ng-click="myOrderActive = 'email' ">Email</th>
								  	<th ng-click="myOrderActive = 'name'">Nombre</th>
								  	<th ng-click="myOrderActive = 'phone'">Teléfono</th>
								  	<th ng-click="myOrderActive = 'sede'" class="hidden-xs">Sede</th>
								  	<th >Estado</th>
								  	<th ></th>
								 </thead>
								 <tbody>
							  	@if(isset($users))
								  	<tr ng-repeat=" x in users | filter : searchUserActive | orderBy : myOrderActive" ng-if="x.active == 1">
								  		<td class="hidden-xs">@{{ x.email }}</td>
								  		<td >@{{ x.name }}</td>
								  		<td>@{{ x.phone ? x.phone : '---'}}</td>
								  		<td class="hidden-xs">
								  			<span  ng-repeat="s in sedes" ng-if="s.id == x.sede_id" class="badge">@{{ s.name }}</span>
								  		</td>
								  		<td data-toggle="modal" data-target="#modalDesactivarUsuario" class="hidden-xs"><a ng-click="addUser( x.id, x.name)" class="btn btn-success btn-xs"><i class="fa fa-check" aria-hidden="true"></i> activo</a></td>
								  		<td>
								  			<a ng-click="addUser( x.id , x.name )" data-toggle="modal" data-target="#modalEliminarUsuario" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								  		</td>
								  	</tr>
							  	@endif
							  	</tbody>
							</table>
					 	</div>
					</div>
				</div>

				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading p3"> <h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp; Usuarios Desactivados </h4>  </div>
					  	<div class="panel-body" >
					  		<input ng-model="searchUserDisabled" type="search" class="form-control" placeholder="Buscar usuario..."></input>
					  		<br>
					  		@if(isset($logUser) && Auth::user()->userType == 1)
								@if($logUser->count > 0)
					  				<a href="{{ route('users.clearNewUsers') }}" class="btn btn-success btn-xs">&nbsp;<i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;&nbsp;Marcar nuevos como vistos</a>
					  			@endif
					  		@endif
					  		<table class="table table-hover">
								<thead>
									<th class="hidden-xs"></th>
								  	<th  class="hidden-xs" ng-click="myOrderDisable = 'email' ">Email</th>
								  	<th ng-click="myOrderDisable = 'name' ">Nombre</th>
								  	<th ng-click="myOrderDisable = 'phone' ">Teléfono</th>
								  	<th ng-click="myOrderDisable = 'sede' " class="hidden-xs">Sede</th>
								  	<th>Estado</th>
								  	<th>
								  	<?php $countU = 0; ?>
								  	@if(isset($users))
								  		@foreach($users as $u)
								  			@if($u->active != 1)
												<?php $countU = $countU + 1; ?>
												@if($countU > 1)
								  					<a href="" data-toggle="modal" data-target="#modalEliminarTodosUsuario" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp; todos</a></th>
												@endif
								  			@endif
								  		@endforeach
								  	@endif
								 </thead>
								 <tbody>
							  	@if(isset($users))
							  		<tr ng-repeat=" x in users | filter : searchUserDisabled | orderBy : myOrderDisable" ng-if="x.active != 1">
								  		<td class="hidden-xs">
											<em style="color: red" ng-if="x.isNew == 1">nuevo</em>&nbsp;&nbsp;&nbsp;&nbsp;
								  		</td>
								  		<td  class="hidden-xs">@{{ x.email }}</td>
								  		<td >@{{ x.name }}</td>
								  		<td>@{{ x.phone ? x.phone : '---'}}</td>
								  		<td class="hidden-xs">@{{ x.sede ? x.sede : '---' }}</td>
								  		<td data-toggle="modal" data-target="#modalActivarUsuario"  class="hidden-xs"><a ng-click="addUser( x.id, x.name)" class="btn btn-default btn-xs"><i class="fa fa-ban" aria-hidden="true"></i> desactivado</a></td>
								  		<td>
								  			<a ng-click="addUser( x.id , x.name )" data-toggle="modal" data-target="#modalEliminarUsuario" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								  		</td>
								  	</tr>
							  	@endif 		
							  	</tbody>
							</table>
					 	</div>
					</div>
				</div>
				
				<!-- Modal Eliminar -->
				<div class="modal fade" id="modalEliminarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				  	{!! Form::open( ['route' => 'users.delete' , 'class' => 'form-horizontal' ,'method' => 'POST'] ) !!}
				  	<input type="hidden" name="_method" value="POST">
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4>¿Desea eliminar al usuario: <em>@{{ userName }}</em> ?</h4>
				      		</div>
				      	<div class="modal-body text-center">
				      		<br>
				      		<div class="form-group">
							   	<label for="password" class="col-sm-2 text-danger control-label">Contraseña:</label>
							   	<div class="col-sm-10">
							   		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña..." required>
							   		<p class="help-block">Debe ingresar su contraseña para poder eliminar usuarios.</p>
							   	</div>
							</div>
				      	</div>
				      	<div class="modal-footer">
				      		<input class="hide" type="text" name="url" value="{{ url()->current() }}">
				      		<input class="hide" type="text" name="id" ng-model="userId">
				        	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> &nbsp;Cerrar</button>
				        	<button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
				      	</div>
				    </div>
				    {!! Form::close() !!}
				  </div>
				</div>
				<!-- Modal Eliminar Todos-->
				<div class="modal fade" id="modalEliminarTodosUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				  	{!! Form::open( ['route' => 'users.deleteAll' , 'class' => 'form-horizontal' ,'method' => 'POST'] ) !!}
				  	<input type="hidden" name="_method" value="POST">
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4>¿ Desea eliminar todos los usuarios desactivados ?</h4>
						   		<p class="help-block red">Esta acción no puede deshacerse.</p>
				      		</div>
				      	<div class="modal-body text-center">
				      		<br>
				      		<div class="form-group">
							   	<label for="password" class="col-sm-2 text-danger control-label">Contraseña:</label>
							   	<div class="col-sm-10">
							   		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña..." required>
							   		<p class="help-block">Debe ingresar su contraseña para poder eliminar usuarios.</p>
							   	</div>
							</div>
				      	</div>
				      	<div class="modal-footer">
				        	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> &nbsp;Cerrar</button>
				        	<button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
				      	</div>
				    </div>
				    {!! Form::close() !!}
				  </div>
				</div>
				<!-- Modal habilitar -->
				<div class="modal fade" id="modalActivarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				  	{!! Form::open( ['route' => 'users.activateUser' , 'class' => 'form-horizontal' ,'method' => 'POST'] ) !!}
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4>¿Desea activar el usuario <em>@{{ userName }}</em> ?</h4>
				      		</div>
				      	<div class="modal-body text-center">
				      		<br>
				      		<div class="form-group">
							   	<label for="password" class="col-sm-2 text-danger control-label">Contraseña:</label>
							   	<div class="col-sm-10">
							   		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña..." required>
							   		<p class="help-block">Debe ingresar su contraseña para poder habilitar usuarios.</p>
							   	</div>
							</div>
				      	</div>
				      	<div class="modal-footer">
				      		<input class="hide" type="text" name="url" value="{{ url()->current() }}">
				      		<input class="hide" type="text" name="id" ng-model="userId">
				      		<input class="hide" type="text" name="activate" value="1">
				        	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> &nbsp;Cerrar</button>
				        	<button type="submit" class="btn btn-success btn-sm">Activar</button>
				      	</div>
				    </div>
				    {!! Form::close() !!}
				  </div>
				</div>
				<!-- Modal deshabilitar -->
				<div class="modal fade" id="modalDesactivarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				  	{!! Form::open( ['route' => 'users.activateUser' , 'class' => 'form-horizontal' ,'method' => 'POST'] ) !!}
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4>¿Desea desactivar al usuario <em>@{{ userName }}</em> ?</h4>
				      		</div>
				      	<div class="modal-body text-center">
				      		<br>
				      		<div class="form-group">
							   	<label for="password" class="col-sm-2 text-danger control-label">Contraseña:</label>
							   	<div class="col-sm-10">
							   		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña..." required>
							   		<p class="help-block">Debe ingresar su contraseña para poder deshabilitar usuarios.</p>
							   	</div>
							</div>
				      	</div>
				      	<div class="modal-footer">
				      		<input class="hide" type="text" name="url" value="{{ url()->current() }}">
				      		<input class="hide" type="text" name="id" ng-model="userId">
				      		<input class="hide" type="text" name="activate" value="0">
				        	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> &nbsp;Cerrar</button>
				        	<button type="submit" class="btn btn-default btn-sm">desactivar</button>
				      	</div>
				    </div>
				    {!! Form::close() !!}
				  </div>
				</div>
				<!-- //////// -->
		</div>
	</div>
<script src="{{ asset('js/adminScripts/userController.js') }}"></script>
@include('admin.partials.footer')
