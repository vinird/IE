@include('admin.partials.head')
@include('admin.partials.nav') 
	@include('admin.partials.aside')
 <!-- contenedor principal -->
		<div class="col-xs-12 col-sm-9 col-md-10 col-xl-11" id="main-container" ng-app="App" ng-controller="acuerdosController" ng-init="users= {{ $users }}; acuerdos= {{ $acuerdos }}; idUser= {{Auth::user()->id}}">
			
				<!-- panel acuerdos  -->
				<div class="clearfix"></div>
				<div class="col-xs-12 col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading p5"> 
							<h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check-square" aria-hidden="true">
								</i>&nbsp;&nbsp; Mis acuerdos <a class="pull-right white"><i class="fa fa-plus-circle fa-lg " id="btnAddUsersToogle" aria-hidden="true" data-toggle="collapse" data-target="#collapseAgregarArchivo" aria-expanded="false" aria-controls="collapseExample"></i></a>&nbsp;&nbsp;&nbsp;&nbsp; 
							</h4>  
						</div>
						<!-- Agregar acuerdo -->
						<div class="collapse row" id="collapseAgregarArchivo">
						   	 	<div class="col-xs-12">
						   	 	{!! Form::open(array('route'=>'acuerdos.store','method'=>'POST', 'files'=>true , 'class' => 'form-horizontal')) !!}
						   	 			<div class="text-center">
						   	 				<h4>Agregar Acuerdo</h4>
						   	 			</div>
						   	 			<br>
						   	 			<div class="form-group">
									   		<label for="title" class="col-sm-2 control-label">Título: </label>
									    	<div class="col-sm-10">
									     		<input type="text" class="form-control" name="title" placeholder="Título del acuerdo..." required>
									   		</div>
									  	</div>
									  	<div class="form-group">
									   		<label for="contenido" class="col-sm-2 control-label">Descripción: </label>
									    	<div class="col-sm-10">
									     		<textArea type="text" class="form-control" name="contenido" required></textArea>
									   	 	</div> 
									  	</div>
									  	<div class="form-group">
										    <div class="col-sm-offset-2 col-sm-10">
										      <div class="checkbox">
										        <label>
										          <input type="checkbox" name="toUser" class="toUser"> Asignar a un usuario
										        </label>
										      </div>
										    </div>
										  </div>
									  	<div class="form-group forUser hide">
									   		<label for="primaryUser_id" class="col-sm-2 control-label">Usuario: </label>
									    	<div class="col-sm-10">
									     		<select class="form-control" name="primaryUser_id" >
									     			<option></option>
									     			@foreach( $users as $user)
									     				<option value="{{$user->id}}">{{$user->name}}</option>
									     			@endforeach
									     		</select>
									   	 	</div> 
									  	</div>
									  
										<div class="form-group">
									   		<label for="date" class="col-sm-2 control-label">Primera revisión: </label>
									    	<div class="col-sm-10">
									     		<input type="date" class="form-control" name="date" placeholder="2012-12-12" required>
									   		</div>
									  	</div>
									  	<div class="form-group">
										    <div class="col-sm-offset-2 col-sm-10">
										      <div class="checkbox">
										        <label>
										          <input type="checkbox" name="file" class="toFile"> Agregar documento
										        </label>
										      </div>
										    </div>
										 </div>
									  	<div class="form-group forFile hide">
									   		<label for="file" class="col-sm-2 control-label">Archivo: </label>
									    	<div class="col-sm-10">
									      		<input type="file" class="form-control" name="file" >
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

							<!-- acuerdos -->
							<!-- /// -->		
							<div class="clearfix"></div>
							<br><br>
							<div class="col-xs-12" ng-repeat="x in acuerdos |  orderBy : 'agreement_date'" ng-if="x.mainUser_id == idUser && x.complete != 1">
								<div class="panel panel-default boxAcuerdos">
									<div ng-if="dateConverted(x.agreement_date) < today" class="panel-heading  pAcuerdos p"> 
										<h4>
											@{{x.title}} 
											<a data-toggle="modal" ng-click="eliminarAcuerdo(x.title, x.id)" data-target="#modalFinalizarAcuerdo" class="pull-right"><i class="fa fa-check" aria-hidden="true"></i></a> &nbsp;&nbsp; 
											<a data-toggle="modal" ng-click="eliminarAcuerdo(x.title, x.id)" data-target="#modalEliminarAcuerdo" class="pull-right"><i class="fa fa-trash" aria-hidden="true"></i></a>
										</h4>   
										<h5>Próxima revisión <span> @{{x.agreement_date}} </span></h5>
									</div>
									<div ng-if="dateConverted(x.agreement_date) >= today && dateConverted(x.agreement_date) < (today + ((24*60*60)*4000 ))" class="panel-heading  pAcuerdos p7"> 
										<h4>
											@{{x.title}} 
											<a data-toggle="modal" ng-click="eliminarAcuerdo(x.title, x.id)" data-target="#modalFinalizarAcuerdo" class="pull-right"><i class="fa fa-check" aria-hidden="true"></i></a> &nbsp;&nbsp; 
											<a data-toggle="modal" ng-click="eliminarAcuerdo(x.title, x.id)" data-target="#modalEliminarAcuerdo" class="pull-right"><i class="fa fa-trash" aria-hidden="true"></i></a>
										</h4>   
										<h5 class="passDate animated flash">Próxima revisión <span>@{{x.agreement_date}} </span></h5>
									</div>
									<div ng-if="dateConverted(x.agreement_date) >= (today + ((24*60*60)*4000 ))" class="panel-heading  pAcuerdos p4"> 
										<h4>
											@{{x.title}} 
											<a data-toggle="modal" ng-click="eliminarAcuerdo(x.title, x.id)" data-target="#modalFinalizarAcuerdo" class="pull-right"><i class="fa fa-check" aria-hidden="true"></i></a> &nbsp;&nbsp; 
											<a data-toggle="modal" ng-click="eliminarAcuerdo(x.title, x.id)" data-target="#modalEliminarAcuerdo" class="pull-right"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
								  		<a data-toggle="modal" ng-click="modificar(x.title, x.id, x.agreement_date, x.content)" data-target="#modalModificarAcuerdo"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								 	</div>
								 	<div class="panel-footer p0 pAcuerdos" >
								 	</div>
								</div>
							</div>
							<!-- /// -->
					  		
							<!-- fin de acuerdos -->
					 	</div>
					</div>
				</div>
				<!-- panel acuerdos generales -->
				<div class="col-xs-12 col-md-4 acuerdosGenerales">
					<div class="panel panel-default">
						<div class="panel-heading p0"> <h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;&nbsp; Acuerdos Generales  </h4>  </div>
					  	<div class="panel-body" >
					  		<input type="search" class="form-control" placeholder="Buscar acuerdos..." ng-model="filterAcuerdo"></input>
					  		<div class="col-xs-12" ng-repeat="x in acuerdos |  orderBy : 'agreement_date' | filter : filterAcuerdo" ng-if="x.complete != 1 && idUser != x.mainUser_id">
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
							<!-- /// -->
							<!-- /// -->
					 	</div>
					</div>
				</div>

				<!-- Panel acuerdos finalizados -->
				<div class="col-xs-12 col-md-4 acuerdosGenerales">
					<div class="panel panel-default">
						<div class="panel-heading p0"> <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Acuerdos Finalizados  </h4>  </div>
					  	<div class="panel-body" >
					  		<input type="search" class="form-control" placeholder="Buscar acuerdos..." ng-model="filterAcuerdo2"></input>
					  		<div class="col-xs-12" ng-repeat="x in acuerdos |  orderBy : 'agreement_date' | filter : filterAcuerdo2" ng-if="x.complete == 1">
								<div class="panel panel-default boxAcuerdos">
									<div class="panel-heading  pAcuerdos p"> 
										<h4>
											@{{x.title}} 
											<div ng-if="x.mainUser_id == idUser">
											<a data-toggle="modal" ng-click="eliminarAcuerdo(x.title, x.id)" data-target="#modalReabrirAcuerdo" class="pull-right"><i class="fa fa-folder-open" aria-hidden="true"></i></a>	
											</div>
										</h4>   
										<h5>Última revisión <span> @{{x.agreement_date}} </span></h5>
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
							<!-- /// -->
							<!-- /// -->
					 	</div>
					</div>
				</div>

				<!-- Modal Modificar -->
				<div class="modal fade" id="modalModificarAcuerdo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4 class="modal-title" id="myModalLabel">Modificar Acuerdo</h4>
				      		</div>
				      	<!-- inicia el formulario -->
						{!! Form::open(array('route'=>'acuerdos.modify','method'=>'POST', 'files'=>true , 'class' => 'form-horizontal')) !!}
						<input class="hidden" name="id" ng-model="id">
				      		<div class="modal-body">
							  	<div class="form-group">
							    	<label for="title" class="col-sm-2 control-label">Título:</label>
							    	<div class="col-sm-10">
							      		<input type="text" class="form-control" name="title" disabled ng-model="title">
							    	</div>
							  	</div>
							  	<div class="form-group">
							    	<label for="date" class="col-sm-2 control-label">Fecha límite:</label>
							    	<div class="col-sm-10">
							    	  	<input type="date" class="form-control" name="date" placeholder="2012-12-12" ng-model="date">
							    	</div>
							  	</div>
				      		<div class="form-group">
							    <div class="col-sm-offset-2 col-sm-10">
							    	<div class="checkbox">
									    <label>
											<input type="checkbox" name="toUser" class="toUser"> Asignar a un usuario
										</label>
									</div>
								</div>
							</div>
							<div class="form-group forUser hide">
								<label for="primaryUser_id" class="col-sm-2 control-label">Usuario: </label>
								<div class="col-sm-10">
									<select class="form-control" name="primaryUser_id" >
										<option></option>
										@foreach( $users as $user)
											<option value="{{$user->id}}">{{$user->name}}</option>
										@endforeach
									</select>
								</div> 
							</div>
							  	<div class="form-group">
							    	<label for="contenido" class="col-sm-2 control-label">Descripción:</label>
							    	<div class="col-sm-10">
							    	  	<textarea class="form-control" name="contenido" ng-model="content"></textarea>
							    	</div>
							  	</div>
				      		<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="file" class="toFile"> Actualizar documento
										</label>
									</div>
								</div>
							</div>
							<div class="form-group forFile hide">
								<label for="file" class="col-sm-2 control-label">Archivo: </label>
								<div class="col-sm-10">
									<input type="file" class="form-control" name="file" >
						      		<p class="help-block">Si actualiza el documento se eliminará el archivo anterior.</p>
								</div> 
							</div>
				      		<br>
				      		<div class="form-group">
							    	<label for="password" class="col-sm-2 text-danger control-label">Contraseña:</label>
							    	<div class="col-sm-10">
							      		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña...">
							      		<p class="help-block">Debe ingresar su contraseña para poder modificar acuerdos.</p>
							    	</div>
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
				<div class="modal fade" id="modalEliminarAcuerdo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				  	<form class="form-horizontal" action="{{ route('acuerdos.delete') }}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input class="hidden" name="id" ng-model="id">
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4>¿Desea eliminar el acuerdo <em>@{{title}} </em> ?</h4>
				      		</div>
				      	<div class="modal-body text-center">
				      		<br>
				      		<div class="form-group">
							   	<label for="password" class="col-sm-2 text-danger control-label">Contraseña:</label>
							   	<div class="col-sm-10">
							   		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña...">
							   		<p class="help-block">Debe ingresar su contraseña para poder eliminar acuerdos.</p>
							   	</div>
							</div>
				      	</div>
				      	<div class="modal-footer">
				        	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
				        	<button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
				      	</div>
				    </div>
				    </form>
				  </div>
				</div>
				<!-- fin modal eliminar -->
				<!-- Modal finalizar -->
				<div class="modal fade" id="modalFinalizarAcuerdo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				  	<form class="form-horizontal" action="{{ route('acuerdos.complete') }}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input class="hidden" name="id" ng-model="id">
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4>¿Desea finalizar el acuerdo <em>@{{title}} </em> ?</h4>
				      		</div>
				      	<div class="modal-body text-center">
				      		<br>
				      		<div class="form-group">
							   	<label for="password" class="col-sm-2 text-danger control-label">Contraseña:</label>
							   	<div class="col-sm-10">
							   		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña...">
							   		<p class="help-block">Debe ingresar su contraseña para poder finalizar acuerdos.</p>
							   	</div>
							</div>
				      	</div>
				      	<div class="modal-footer">
				        	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
				        	<button type="submit" class="btn btn-success btn-sm">Finalizar</button>
				      	</div>
				    </div>
				    </form>
				  </div>
				</div>
				<!-- fin modal finalizar -->
				<!-- Modal reabrir -->
				<div class="modal fade" id="modalReabrirAcuerdo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				  	<form class="form-horizontal" action="{{ route('acuerdos.open') }}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input class="hidden" name="id" ng-model="id">
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4>¿Desea reabrir el acuerdo <em>@{{title}} </em> ?</h4>
				      		</div>
				      	<div class="modal-body text-center">
				      		<br>
				      		<div class="form-group">
							   	<label for="password" class="col-sm-2 text-danger control-label">Contraseña:</label>
							   	<div class="col-sm-10">
							   		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña...">
							   		<p class="help-block">Debe ingresar su contraseña para poder reabrir acuerdos.</p>
							   	</div>
							</div>
				      	</div>
				      	<div class="modal-footer">
				        	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
				        	<button type="submit" class="btn btn-primary btn-sm">Abrir</button>
				      	</div>
				    </div>
				    </form>
				  </div>
				</div>
				<!-- fin modal reabrir -->
		</div>

	</div>
<script src="{{ asset('js/adminScripts/acuerdosController.js') }}"></script>

@include('admin.partials.footer')