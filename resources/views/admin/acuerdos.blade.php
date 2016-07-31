@include('admin.partials.head')
@include('admin.partials.nav')
	@include('admin.partials.aside')
 <!-- contenedor principal -->
		<div class="col-xs-12 col-sm-9 col-md-10 col-xl-11" id="main-container" ng-app="App" ng-controller="acuerdosController" ng-init="users= {{ $users }}; acuerdos= {{ $acuerdos }}; idUser= {{Auth::user()->id}}; seguimientos= {{ $seguimientos }};">

				<!-- panel acuerdos  -->
				<div class="clearfix"></div>
				<div class="col-xs-12 col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading p5">
							<h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check-square" aria-hidden="true">
							</i>&nbsp;&nbsp; Mis acuerdos <a class="pull-right white"><i class="fa fa-plus-circle fa-lg " id="btnAddPanelToogle" aria-hidden="true" data-toggle="collapse" data-target="#collapseAgregarAcuerdo" aria-expanded="false" aria-controls="collapseExample"></i></a>&nbsp;&nbsp;&nbsp;&nbsp; 
							</h4>
						</div>
						<!-- Agregar acuerdo -->
						<div class="collapse row" id="collapseAgregarAcuerdo">
						   	 	<div class="col-xs-12">
						   	 	{!! Form::open(array('route'=>'acuerdos.store','method'=>'POST', 'files'=>true , 'class' => 'form-horizontal' , 'autocomplete' => 'off')) !!}
						   	 			<div class="text-center">
						   	 				<h4>Agregar Acuerdo</h4>
						   	 			</div>
						   	 			<br>
						   	 			<div class="form-group">
									   		<label for="title" class="col-sm-3 control-label">Título: </label>
									    	<div class="col-sm-9">
									     		<input type="text" class="form-control" name="title" placeholder="Título del acuerdo..." required>
									   		</div>
									  	</div>
									  	<div class="form-group">
									   		<label for="contenido" class="col-sm-3 control-label">Descripción: </label>
									    	<div class="col-sm-9">
									     		<textArea type="text" class="form-control" name="contenido" required></textArea>
									   	 	</div>
									  	</div>
									  	<div class="form-group">
										    <div class="col-sm-offset-3 col-sm-9">
										      <div class="checkbox">
										        <label>
										          <input type="checkbox" name="toUser" class="toUser"> Asignar a un usuario
										        </label>
										      </div>
										    </div>
										  </div>
									  	<div class="form-group forUser hide">
									   		<label for="primaryUser_id" class="col-sm-3 control-label">Usuario: </label>
									    	<div class="col-sm-9">
									     		<select class="form-control" name="primaryUser_id" >
									     			<option></option>
									     			@foreach( $users as $user)
									     				@if($user->active == 1)
										     				<option value="{{$user->id}}">{{$user->name}}</option>
										     				@endif
									     			@endforeach
									     		</select>
									   	 	</div>
									  	</div>

										<div class="form-group">
									   		<label for="date" class="col-sm-3 control-label">Primera revisión: </label>
									    	<div class="col-sm-9">
									     		<input type="date" class="form-control" name="date" placeholder="2012-12-12" required>
									   		</div>
									  	</div>
									  	<div class="form-group">
										    <div class="col-sm-offset-3 col-sm-9">
										      <div class="checkbox">
										        <label>
										          <input type="checkbox" name="file" class="toFile"> Agregar documento
										        </label>
										      </div>
										    </div>
										 </div>
									  	<div class="form-group forFile hide">
									   		<label for="file" class="col-sm-3 control-label">Archivo: </label>
									    	<div class="col-sm-9">
									      		<input type="file" class="form-control" name="file" >
									   	 	</div>
									  	</div>
									  	<br>
									  	<div class="form-group">
									    	<div class="col-sm-offset-3 col-sm-9">
									      		<button type="submit" class="btn btn-primary btn-sm "><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;Agregar</button>
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
										<h5>Última revisión <span> @{{x.agreement_date}} </span></h5>
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
								  		<!-- nuevo seguimiento -->
								  		<button class="btn btn-success btn-xs" role="button" data-toggle="collapse"  href="#nuevoSeguimiento@{{x.id}}" aria-expanded="true" aria-controls="nuevoSeguimiento@{{x.id}}">Agregar seguimiento &nbsp;&nbsp;<i class="fa fa-plus-square" aria-hidden="true"></i></button>

								  		<div id="nuevoSeguimiento@{{x.id}}" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne" style="padding: 2px;">
										    {!! Form::open(array('route'=>'acuerdos.agregarSeguimiento','method'=>'POST' , 'class' => 'form-horizontal' , 'autocomplete' => 'off')) !!}
										    <input type="text" class="hide" name="acuerdo_id" value="@{{ x.id }}">
											<div class="form-group">
										   		<label for="title" class="col-sm-3 control-label">Título: </label>
										    	<div class="col-sm-9">
										     		<input type="text" class="form-control" name="title" required>
										   		</div>
										  	</div>
										  	<div class="form-group">
										   		<label for="content" class="col-sm-3 control-label">Descripción: </label>
										    	<div class="col-sm-9">
										     		<textArea type="text" class="form-control" name="content" required></textArea>
										   	 	</div>
										  	</div>
											 <div class="form-group">
										    	<div class="col-sm-offset-3 col-sm-9">
										      		<button type="submit" class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;Agregar</button>
										    	</div>
										  	</div>
											</form>
										</div>
										<!-- fin -->
								  		<!-- si hay seguimiento -->
								  		<div class="seguimiento-box">
											<br>
								  			<div class="panel-group" id="accordion@{{x.id}}" role="tablist" aria-multiselectable="true">

								  			<!-- <div  > -->
											  <div class="panel panel-default" ng-repeat="s in seguimientos" ng-if="s.acuerdo_id == x.id">
											    <div class="panel-heading" role="tab" id="heading@{{x.id}}@{{ s.id }}">
											      <h4 class="panel-title">
											        <button class="btn btn-default btn-xs" role="button" data-toggle="collapse" data-parent="#accordion@{{x.id}}" href="#@{{x.id}}@{{ s.id }}" aria-expanded="true" aria-controls="@{{x.id}}@{{ s.id }}">
											          <i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;@{{ s.title}}
											        </button>
											      </h4>
											    </div>
											    <div id="@{{x.id}}@{{ s.id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading@{{x.id}}@{{ s.id }}">
											      <div class="panel-body">
											       	@{{ s.content }}
											       	<h6>@{{ s.created_at }}</h6>
											       	<a href="" data-toggle="modal" ng-click="setValuesSeguimiento(s.id , s.title, s.content)" data-target="#modalModificarSeguimiento"><i class="fa fa-pencil" aria-hidden="true"></i></a> &nbsp;&nbsp;
											       	<a href="" data-toggle="modal" ng-click="setValuesSeguimiento(s.id , s.title, s.content)" data-target="#modalEliminarSeguimiento"><i class="fa fa-trash" aria-hidden="true"></i></a> 
											      </div>
											    </div>
											  </div>

											</div>
								  		</div>
								  		<!-- fin -->
								  		<div ng-if="x.primaryUser_id != null">
								  			<div ng-repeat="u in users" ng-if="u.id == x.primaryUser_id">Asignado a: <em> @{{ u.name }}</em></div>
								  		</div>
								  		<!-- <br> -->
								  		<div ng-if="x.file_url != null">
								  			<h6>Documento del acuerdo</h6>
								  			<a href="/file/getAcuerdos/@{{ x.file_url }}"><i class="fa fa-download" aria-hidden="true"></i></a> &nbsp;@{{ x.file_url }}
								  		</div>
								  		<br>
								  		<a class="btn btn-warning btn-xs" data-toggle="modal" ng-click="modificar(x.title, x.id, x.agreement_date, x.content)" data-target="#modalModificarAcuerdo"><i class="fa fa-pencil" aria-hidden="true"></i></a>
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

				<!-- tabs -->

				<div class="col-xs-12 col-md-6 pull-right">
				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a id="tabGenerales" href="#home" aria-controls="home" role="tab" data-toggle="tab">
						 <h5 class="hidden-xs">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;&nbsp; Acuerdos Generales  </h5>  
						 <h6 class="hidden-sm hidden-md hidden-lg">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;&nbsp; Acuerdos Generales  </h6>  
				    </a></li>
				    <li role="presentation"><a id="tabFianlizados" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
				    	 <h5 class="hidden-xs"><i class="fa fa-archive" aria-hidden="true"></i>&nbsp;&nbsp; Acuerdos Finalizados  </h5>  
				    	 <h6 class="hidden-sm hidden-md hidden-lg"><i class="fa fa-archive" aria-hidden="true"></i>&nbsp;&nbsp; Acuerdos Finalizados  </h6>  
				    </a></li>
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">

				    <div role="tabpanel" class="tab-pane active " id="home">
						<div class=" acuerdosGenerales">
							<div class="panel panel-default">
							  	<div class="panel-body" >
							  		<input type="search" class="form-control" placeholder="Buscar acuerdos..." ng-model="filterAcuerdo"></input>
							  		<div class="col-xs-12" ng-repeat="x in acuerdos |  orderBy : 'agreement_date' | filter : filterAcuerdo" ng-if="x.complete != 1 && idUser != x.mainUser_id">
										<div class="panel panel-default boxAcuerdos">
											<div ng-if="dateConverted(x.agreement_date) < today" class="panel-heading  pAcuerdos p">
												<h4>
													@{{x.title}}
												</h4>
												<h5>Última revisión <span> @{{x.agreement_date}} </span></h5>
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
										  		<!-- si hay seguimiento -->
										  		<div class="seguimiento-box">
													<br>
										  			<div class="panel-group" id="accordion@{{x.id}}" role="tablist" aria-multiselectable="true">

										  			<!-- <div  > -->
													  <div class="panel panel-default" ng-repeat="s in seguimientos" ng-if="s.acuerdo_id == x.id">
													    <div class="panel-heading" role="tab" id="heading@{{x.id}}@{{ s.id }}">
													      <h4 class="panel-title">
													        <button class="btn btn-default btn-xs" role="button" data-toggle="collapse" data-parent="#accordion@{{x.id}}" href="#@{{x.id}}@{{ s.id }}" aria-expanded="true" aria-controls="@{{x.id}}@{{ s.id }}">
													          <i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;@{{ s.title}}
													        </button>
													      </h4>
													    </div>
													    <div id="@{{x.id}}@{{ s.id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading@{{x.id}}@{{ s.id }}">
													      <div class="panel-body">
													       	@{{ s.content }}
													       	<h6>@{{ s.created_at }}</h6>
													      </div>
													    </div>
													  </div>

													</div>
										  		</div>
										  		<!-- fin -->
										  		<div ng-if="x.primaryUser_id != null">
										  			<div ng-repeat="u in users" ng-if="u.id == x.primaryUser_id">Asignado a: <em> @{{ u.name }}</em></div>
										  		</div>
										  		<br>
										  		<div ng-if="x.file_url != null">
										  			<h6>Documento del acuerdo</h6>
										  			<a href="/file/getAcuerdos/@{{ x.file_url }}"><i class="fa fa-download" aria-hidden="true"></i></a> &nbsp;@{{ x.file_url }}
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
				    </div>

				    <div role="tabpanel" class="tab-pane " id="profile">
				    	<div class="acuerdosGenerales">
							<div class="panel panel-default">
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
										  		<!-- si hay seguimiento -->
										  		<div class="seguimiento-box">
													<br>
										  			<div class="panel-group" id="accordion@{{x.id}}" role="tablist" aria-multiselectable="true">

										  			<!-- <div  > -->
													  <div class="panel panel-default" ng-repeat="s in seguimientos" ng-if="s.acuerdo_id == x.id">
													    <div class="panel-heading" role="tab" id="heading@{{x.id}}@{{ s.id }}">
													      <h4 class="panel-title">
													        <button class="btn btn-default btn-xs" role="button" data-toggle="collapse" data-parent="#accordion@{{x.id}}" href="#@{{x.id}}@{{ s.id }}" aria-expanded="true" aria-controls="@{{x.id}}@{{ s.id }}">
													          <i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;@{{ s.title}}
													        </button>
													      </h4>
													    </div>
													    <div id="@{{x.id}}@{{ s.id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading@{{x.id}}@{{ s.id }}">
													      <div class="panel-body">
													       	@{{ s.content }}
													       	<h6>@{{ s.created_at }}</h6>
													      </div>
													    </div>
													  </div>

													</div>
										  		</div>
										  		<div ng-if="x.primaryUser_id != null">
										  			<div ng-repeat="u in users" ng-if="u.id == x.primaryUser_id">Asignado a: <em> @{{ u.name }}</em></div>
										  		</div>
										  		<br>
										  		<!-- fin -->
										  		<div ng-if="x.file_url != null">
										  			<h6>Documento del acuerdo</h6>
										  			<a href="/file/getAcuerdos/@{{ x.file_url }}"><i class="fa fa-download" aria-hidden="true"></i></a> &nbsp;@{{ x.file_url }}
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
				    </div>

				  </div>
				  <!-- end tabs panes -->

				</div>

				<!-- end tabs -->


				<!-- Modal Modificar -->
				<div class="modal fade" id="modalModificarAcuerdo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4 class="modal-title" id="myModalLabel">Modificar Acuerdo</h4>
				      		</div>
				      	<!-- inicia el formulario -->
						{!! Form::open(array('route'=>'acuerdos.modify','method'=>'POST', 'files'=>true , 'class' => 'form-horizontal' , 'autocomplete' => 'off')) !!}
						<input class="hidden" name="id" ng-model="id">
				      		<div class="modal-body">
							  	<div class="form-group">
							    	<label for="title" class="col-sm-3 control-label">Título:</label>
							    	<div class="col-sm-9">
							      		<input type="text" class="form-control" name="title" disabled ng-model="title" required>
							    	</div>
							  	</div>
							  	<div class="form-group">
							    	<label for="date" class="col-sm-3 control-label">Nueva revisión:</label>
							    	<div class="col-sm-9">
							    	  	<input type="date" class="form-control" name="date" placeholder="2012-12-12" ng-model="date" required>
							    	</div>
							  	</div>
				      		<div class="form-group">
							    <div class="col-sm-offset-3 col-sm-9">
							    	<div class="checkbox">
									    <label>
											<input type="checkbox" name="toUser" class="toUser2"> Asignar a un usuario
										</label>
									</div>
								</div>
							</div>
							<div class="form-group forUser2 hide">
								<label for="primaryUser_id" class="col-sm-3 control-label">Usuario: </label>
								<div class="col-sm-9">
									<select class="form-control" name="primaryUser_id" >
										<option></option>
										@foreach( $users as $user)
											@if($user->active == 1)
												<option value="{{$user->id}}">{{$user->name}}</option>
											@endif
										@endforeach
									</select>
								</div>
							</div>
							  	<div class="form-group">
							    	<label for="contenido" class="col-sm-3 control-label">Descripción:</label>
							    	<div class="col-sm-9">
							    	  	<textarea class="form-control" name="contenido" ng-model="content"></textarea>
							    	</div>
							  	</div>
				      		<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<div class="checkbox">
										<label>
											<input type="checkbox" name="file" class="toFile2"> Actualizar documento
										</label>
									</div>
								</div>
							</div>
							<div class="form-group forFile2 hide">
								<label for="file" class="col-sm-3 control-label">Archivo: </label>
								<div class="col-sm-9">
									<input type="file" class="form-control" name="file" >
						      		<p class="help-block">Si actualiza el documento se eliminará el archivo anterior.</p>
								</div>
							</div>
				      		<br>
				      		<div class="form-group">
							    	<label for="password" class="col-sm-3 text-danger control-label">Contraseña:</label>
							    	<div class="col-sm-9">
							      		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña..." required>
							      		<p class="help-block">Debe ingresar su contraseña para poder modificar acuerdos.</p>
							    	</div>
							  	</div>
				      		</div>
				      		<div class="modal-footer">
				        		<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> &nbsp;Cerrar</button>
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
							   		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña..." required>
							   		<p class="help-block">Debe ingresar su contraseña para poder eliminar acuerdos.</p>
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
							   		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña..." required>
							   		<p class="help-block">Debe ingresar su contraseña para poder finalizar acuerdos.</p> 
							   	</div>
							</div>
				      	</div>
				      	<div class="modal-footer">
				        	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> &nbsp;Cerrar</button>
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
							   		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña..." required>
							   		<p class="help-block">Debe ingresar su contraseña para poder reabrir acuerdos.</p>
							   	</div>
							</div>
				      	</div>
				      	<div class="modal-footer">
				        	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> &nbsp;Cerrar</button>
				        	<button type="submit" class="btn btn-primary btn-sm">Abrir</button>
				      	</div>
				    </div>
				    </form>
				  </div>
				</div>
				<!-- fin modal reabrir -->

				<!-- Modal modalModificarSeguimiento -->
				<div class="modal fade" id="modalModificarSeguimiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				  	<form class="form-horizontal" action="{{ route('acuerdos.modificarSeguimiento') }}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input class="hidden" name="id" ng-model="idSeguimiento">
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4>Modificar <em>@{{titleSeguimiento}} </em> </h4>
				      		</div>
				      	<div class="modal-body text-center">
				      		<div class="form-group">
							   	<label for="content" class="col-sm-2 control-label">Descripción:</label>
							   	<div class="col-sm-10">
							   		<textarea  class="form-control" name="content" ng-model="contentSeguimiento" required></textarea>
							   	</div>
							</div>
				      		<br>
				      		<div class="form-group">
							   	<label for="password" class="col-sm-2 text-danger control-label">Contraseña:</label>
							   	<div class="col-sm-10">
							   		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña..." required>
							   		<p class="help-block">Debe ingresar su contraseña para poder modificar seguimientos.</p>
							   	</div>
							</div>
				      	</div>
				      	<div class="modal-footer">
				        	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> &nbsp;Cerrar</button>
				        	<button type="submit" class="btn btn-warning btn-sm">Modificar</button>
				      	</div>
				    </div>
				    </form>
				  </div>
				</div>
				<!-- fin modal modalModificarSeguimiento -->

				<!-- Modal modalEliminarSeguimiento -->
				<div class="modal fade" id="modalEliminarSeguimiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				  	<form class="form-horizontal" action="{{ route('acuerdos.eliminarSeguimiento') }}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input class="hidden" name="id" ng-model="idSeguimiento">
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4>¿Desea eliminar <em>@{{titleSeguimiento}} </em> ?</h4>
				      		</div>
				      	<div class="modal-body text-center">
				      		<br>
				      		<div class="form-group">
							   	<label for="password" class="col-sm-2 text-danger control-label">Contraseña:</label>
							   	<div class="col-sm-10">
							   		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña..." required>
							   		<p class="help-block">Debe ingresar su contraseña para poder eliminar seguimientos.</p>
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
				<!-- fin modal modalEliminarSeguimiento -->
		</div>

	</div>
<script src="{{ asset('js/adminScripts/acuerdosController.js') }}"></script>

@include('admin.partials.footer')
