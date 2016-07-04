@include('admin.partials.head')
@include('admin.partials.nav')
	@include('admin.partials.aside')
 <!-- contenedor principal -->
		<div class="col-xs-12 col-sm-9 col-md-10 col-xl-11" id="main-container" ng-app="App" ng-controller="sedesController" ng-init="sedes = {{ $sedes }}; linkMap= '';">

				<!-- panel sede -->
				<div class="col-xs-12 col-md-8 col-xl-9">
					<div class="panel panel-default">
						<div class="panel-heading p3"> <h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp; Panel de Sedes </h4></div>
					  	<div class="panel-body" >
					  		<input ng-model="searchSede" type="search" class="form-control" placeholder="Buscar sede..."></input>
					  		<table class="table table-hover">
								<thead>
								  	<th ng-click="myOrderActive = 'name'">Nombre</th>
								  	<th ng-click="myOrderActive = 'address'">Dirección</th>
								  	<th></th>
								 </thead>
								 <tbody>
							  		<tr ng-repeat=" x in sedes | filter : searchSede | orderBy : myOrderActive ">
							  			<td>@{{ x.name }}</td>
							  			<td>@{{ x.address }}</td>
							  			<td>
							  				<a ng-click="modSede(x.id, x.name, x.address, x.phone, x.link)" data-toggle="modal" data-target="#modalModificarUsuario" class="btn btn-xs btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>

							  				<a ng-click="fSedeID(x.id, x.name)" data-toggle="modal" data-target="#modalEliminarUsuario" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							  			</td>
							  		</tr>
							  	</tbody>
							</table>
					 	</div>
					</div>
				</div>

				<!-- panel agregar sede -->
				<div class="col-xs-12 col-md-4 col-xl-3">
					<div class="panel panel-default">
						<div class="panel-heading p4"> <h4>&nbsp;&nbsp;&nbsp;&nbsp; Agregar Sede  </h4></div>
					  	<div class="panel-body">
					  		<!-- inicia el formulario -->
					    	{!! Form::open(['route'=>['sedes.store'], 'class'=>'form-horizontal' , 'autocomplete' => 'off'] ) !!}
							  	<div class="form-group">
							    	<label for="name" class>Nombre:</label>
							      	<input type="text" class="form-control" name="name" required>
							  	</div>
							  	<div class="form-group">
							    	<label for="address" >Dirección:</label>
							    	  	<input type="text" class="form-control" name="address">
							  	</div>
							  	<div class="form-group">
							    	<div class="checkbox">
									    <label>
									        <input type="checkbox" name="toMap" class="toMap" >Agregar mapa de google
									    </label>
									</div>
							  	</div>
							  	<div class="form-group forMap hide">
							    	<label for="link" >Código de inserción del mapa: <a href="" data-toggle="modal" data-target="#modalVerMapa"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
							    	  	<textarea id="tAreaMap1" class="form-control" name="link" placeholder="Aquí debe agregar la etiqueta HTML <iframe> con el codigo de inserción de google maps." ng-model="linkMap" style="min-height: 70px;"></textarea>
							    	  	<div class="col-xs-6">
				        					<a class="btn btn-success btn-xs btn-block" ng-click="verMapa()"><i class="fa fa-search-plus" aria-hidden="true"></i> &nbsp;Ver mapa</a>
							    	  	</div>
							    	  	<div class="col-xs-6">
				        					<a class="btn btn-primary btn-xs btn-block" ng-click="ocultarMapa()"><i class="fa fa-minus-square-o" aria-hidden="true"></i> &nbsp;Ocultar mapa</a>
							    	  	</div>

				        				<br>
				      					<div class="embed-responsive embed-responsive-16by9 frameMap hide"></div>

							  	</div>
							  	<br>
				        		<button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;Agregar</button>
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
				        		<h4 class="modal-title" id="myModalLabel">Modificar Sede <em>@{{ sedeName }}</em></h4>
				      		</div>
				      	<!-- inicia el formulario -->
				        {!! Form::open(['route'=>['sedes.updateSede'], 'class'=>'form-horizontal' , 'autocomplete' => 'off'] ) !!}
							<input class="hide" type="text" name="id" ng-model="sedeID">
				      		<div class="modal-body">
							  	<div class="form-group">
										<input class="hide" type="text" name="id" ng-model="sedeID">
							    	<label for="name" class="col-sm-2 control-label">Nombre:</label>
							    	<div class="col-sm-10">
							      		<input type="text" class="form-control" name="name" placeholder="Nombre..." ng-model="sedeName" required>
							    	</div>
							  	</div>
							  	<div class="form-group">
							    	<label for="address" class="col-sm-2 control-label">Dirección:</label>
							    	<div class="col-sm-10">
							    	  	<input type="text" class="form-control" name="address" placeholder="Dirección..." ng-model="address">
							    	</div>
							  	</div>
							  	<div class="form-group">
							    	<div class="checkbox col-sm-12" >
									    <label>
									        <input type="checkbox" name="toMap2" class="toMap2" > 	
									        	<div ng-if="link == ''">Agregar mapa de google</div> 
									        	<div ng-if="link != ''">Modificar mapa de google</div>
									    </label>
									</div>
							  	</div>
							  	<div class="form-group forMap2 hide">
							    	<label for="link" >Código de inserción del mapa: <a href="" data-toggle="modal" data-target="#modalVerMapa"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
							    	  	<textarea class="form-control" name="link" placeholder="Aquí debe agregar la etiqueta HTML <iframe> con el codigo de inserción de google maps." ng-model="link" style="min-height: 70px;" "></textarea>
							    	  	<div class="col-xs-6">
				        					<a class="btn btn-success btn-xs btn-block" ng-click="verMapa2()"><i class="fa fa-search-plus" aria-hidden="true"></i> &nbsp;Ver mapa</a>
							    	  	</div>
							    	  	<div class="col-xs-6">
				        					<a class="btn btn-primary btn-xs btn-block" ng-click="ocultarMapa2()"><i class="fa fa-minus-square-o" aria-hidden="true"></i> &nbsp;Ocultar mapa</a>
							    	  	</div>

				        				<br>
				      					<div class="embed-responsive embed-responsive-16by9 frameMap2 hide" style="max-height: 70px !important;"></div>

							  	</div>
				      		<br>
				      		<div class="form-group">
							    	<label for="password" class="col-sm-2 text-danger control-label">Contraseña:</label>
							    	<div class="col-sm-10">
							      		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña..." required>
							      		<p class="help-block">Debe ingresar su contraseña para poder modificar sedes.</p>
							    	</div>
							  	</div>
				      		<div class="modal-footer">
				        		<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> &nbsp;Cerrar</button>
				        		<button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> &nbsp;Modificar</button>
				      		</div>
						</form>
						<!-- termina el formulario -->
				    </div>
				  </div>
				</div>
			</div>
				<!-- Modal Eliminar -->
				<div class="modal fade" id="modalEliminarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				  	{!! Form::open(['route'=>['sedes.deleteSede'], 'class'=>'form-horizontal'] ) !!}
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
										<input class="hide" type="text" name="id" ng-model="sedeID">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4>¿Desea eliminar la sede <em>@{{ sedeName }}</em>?</h4>
							    <p class="help-block red">Si elimina una sede esto afectará la página informativa.</p>
				      		</div>
				      	<div class="modal-body text-center">
				      		<br>
				      		<div class="form-group">
							   	<label for="password" class="col-sm-2 text-danger control-label">Contraseña:</label>
							   	<div class="col-sm-10">
							   		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña..." required>
							   		<p class="help-block">Debe ingresar su contraseña para poder eliminar sedes.</p>
							   	</div>
							</div>
				      	</div>
				      	<div class="modal-footer">
				        	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> &nbsp;Cerrar</button>
				        	<button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
				      	</div>
				    </div>
				    </form>
				  </div>
				</div>

				<!-- Modal Ver mapa -->
				<div class="modal fade" id="modalVerMapa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
										<input class="hide" type="text" name="id" ng-model="sedeID">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4>Procedimiento para incorporar el mapa</h4>
				      		</div>
				      	<div class="modal-body">
				      		<p>El código de inserción debe copiarse de la página oficial de Google Maps, en la opción de compartir se selecciona <strong>incorporar mapa.</strong> como se muestra en la imagen</p>
				      		<img class="img img-responsive" src="{{asset('img/img_include/map_example.png')}}"><br/>
				      		<p>Después de seleccionar el código se pega en el campo de texto y se verifica con la opción de ver mapa.</p>
				      		<strong><h4>Si el procedimiento se realizó correctamente se mostrará el mapa.</h4></strong>
				      	</div>
				      	<div class="modal-footer">
				        	<button class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
				      	</div>
				    </div>
				  </div>
				</div>
		</div>
	</div>

<script src="{{ asset('js/adminScripts/sedesController.js') }}"></script>
@include('admin.partials.footer')
