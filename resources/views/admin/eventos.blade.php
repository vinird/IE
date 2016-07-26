@include('admin.partials.head')
<link rel="stylesheet" href="{{ asset('js/js_resources/trumbowyg/ui/trumbowyg.min.css') }}" />
@include('admin.partials.nav')
	@include('admin.partials.aside')

 <!-- Contenedor principal -->
		<div class="col-xs-12 col-sm-9 col-md-10 col-xl-11" id="main-container" ng-app="App" ng-controller="eventoController" ng-init="eventos = {{ $eventos }}; users = {{ $users }}; userID={{ Auth::user()->id }}; sedes = {{ $sedes }}; userType= <?php if(null !== Auth::user()->userType){ echo Auth::user()->userType;  }else{ echo "0";} ?>">

				<!-- Panel eventos -->
				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading p6">
							<h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar-o" aria-hidden="true"></i>&nbsp;&nbsp; Eventos <a class="pull-right white"><i class="fa fa-plus-circle fa-lg " id="btnAddPanelToogle" aria-hidden="true" data-toggle="collapse" data-target="#collapseAgregarEvento" aria-expanded="false" aria-controls="collapseExample"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
							</h4>
						</div>
						<!-- Agregar evento -->
						<div class="collapse row" id="collapseAgregarEvento">
							<div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
						  	{!!  Form::open(array('route'=>'eventos.store','method'=>'POST', 'files'=>true , 'class' => 'form-horizontal' , 'autocomplete' => 'off'))  !!}
										@if(isset($sedes) && count($sedes) > 0)
							   	 		<div class="text-center">
							   	 			<h4>Agregar Evento</h4>
							   	 		</div>
							   	 		<br>
							   	 		<div class="form-group">
										   	<label for="title" class="col-sm-2 control-label">Título: </label>
										    <div class="col-sm-10">
										     	<input type="text" class="form-control" name="title" placeholder="Título del evento..." required>
										   	</div>
										  </div>
											<div class="form-group">
										   	<label for="date" class="col-sm-2 control-label">Fecha: </label>
										    <div class="col-sm-10">
										     	<input type="date" class="form-control" name="date" placeholder="2012-12-12" required>
										   	</div>
										  </div>
											<div class="form-group">
										    <div class="checkbox">
												  <label class="col-sm-10 col-sm-offset-2">
												    <input type="checkbox" id="toFile">Agregar un archivo
												  </label>
												</div>
											</div>
											<div id="divFile" class="form-group hide">
										    <label for="file" class="col-sm-2 control-label">Archivo:</label>
										    <div class="col-sm-10">
										      <input type="file" class="form-control" name="file">
										    </div>
										  </div>
											<div class="form-group">
										    <div class="checkbox">
												  <label class="col-sm-10 col-sm-offset-2">
												    <input type="checkbox" id="toImg">Agregar una imagen
												  </label>
												</div>
											</div>
										  <div id="divImg" class="form-group hide">
										    <label for="img" class="col-sm-2 control-label">Imagen:</label>
										    <div class="col-sm-10">
										      <input type="file" class="form-control" name="img" accept="image/*">
										    	</div>
										  </div>
										  <div class="form-group">
										   	<label for="contenido" class="col-sm-2 control-label">Contenido: </label>
										    <div class="col-sm-10">
										     	<textArea type="text" class="form-control textarea" name="content"></textArea>
										   	 </div>
										  </div>
										  <div class="form-group">
										    <label for="category" class="col-sm-2 control-label">Sede:</label>
										    <div class="col-sm-10">
										    	<select class="form-control" name="sede">
														@foreach ($sedes as $sede)
															<option value="{{ $sede->id }}">{{ $sede->name }}</option>
														@endforeach
													</select>
										    </div>
										  </div>
											<div class="form-group">
										   	<label for="org" class="col-sm-2 control-label">Organizador: </label>
										    <div class="col-sm-10">
										     	<input type="text" class="form-control" name="org" placeholder="Organizador del evento... Puede dejarlo vacío si usted es el organizador">
										   	</div>
										  </div>
										  <br>
										  <div class="form-group">
										  	<div class="col-sm-offset-2 col-sm-10">
										      <button type="submit" class="btn btn-primary btn-sm">Agregar</button>
										    </div>
										  </div>
										@else
											<br><br><br><br><br>
											<div class="text-center">
												<h4>Debe incluir una sede para agregar eventos.</h4>
											</div>
											<br><br><br><br><br><br><br><br>
										@endif
								</form>
						  </div>
						</div>
					  <div class="panel-body">
					  	<input ng-model="searchEvento" type="search" class="form-control" placeholder="Buscar evento...">
					  	<table class="table table-hover">
								@if(isset($eventos) && count($eventos) > 0)
									<thead>
										<th ng-click="myOrderActive = 'title'">Título</th>
										<th>Evento</th>
										<th ng-click="myOrderActive = 'event_date'">Fecha del evento</th>
										<th class="hidden-xs" ng-click="myOrderActive = 'sede_id'">Sede del evento</th>
										<th ng-click="myOrderActive = 'organizer'">Organizado por</th>
										<th class="hidden-xs hidden-sm" ng-click="myOrderActive = 'publisher'">Publicado por</thclass>
										<th class="hidden-xs hidden-sm" ng-click="myOrderActive = 'created_at'">Fecha de publicación</th>
									  <th class="hidden-xs hidden-sm" ng-click="myOrderActive = 'updated_at'">Fecha de modificación</th>
										<th></th>
									</thead>
									<tbody>
										<tr ng-repeat=" x in eventos | filter : searchEvento | orderBy : myOrderActive">
									  	<td>@{{ x.title }}</td>
									  	<td>
									  		<a ng-click="setEventValues( x.id , x.title, x.content )" data-toggle="modal" data-target="#modalVerEvento"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>
									  	</td>
											<td>@{{ x.event_date.split(" ")[0] }}</td>
											<td class="hidden-xs" ng-repeat="sede in sedes" ng-if="sede.id == x.sede_id"><span class="badge">@{{ sede.name }}</span></td>
									  	<td>@{{ x.org }}</td>
											<td class="hidden-xs hidden-sm" ng-repeat="user in users" ng-if="user.id == x.user_id">
												<span>@{{ user.name }}</span>
											</td>
									  	<td class="hidden-xs hidden-sm">@{{ x.created_at }}</td>
											<td class="hidden-xs hidden-sm">@{{ x.updated_at }}</td>
											<td></td>
									  	<td>
												<div ng-if="userType == 1 || userID == x.user_id">
										  		<a ng-click="setEdit( x.id , x.title , x.event_date , x.content , x.sede_id , x.org )" data-toggle="modal" data-target="#modalModificarEvento" class="btn btn-xs btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>

										  		<a ng-click="setEventValues( x.id , x.title )" data-toggle="modal" data-target="#modalEliminarEvento" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
												</div>
									  	</td>
									  </tr>
									</tbody>
							 	@else
									<h3 class="text-center">No hay eventos</h3>
							 	@endif
							</table>
					 	</div>
					</div>
				</div>

				<!-- Modal modificar -->
				<div class="modal fade" id="modalModificarEvento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog modal-lg" role="document">
				  	<div class="modal-content">
				      <div class="modal-header text-center">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        	<h4 class="modal-title" id="myModalLabel">Modificar evento</h4>
				      </div>
				      <!-- Inicia el formulario -->
				      {!! Form::open(array('route'=>'eventos.modify','method'=>'POST', 'files'=>true , 'class' => 'form-horizontal' , 'autocomplete' => 'off')) !!}
					      	<div class="modal-body">
										<input class="hide" type="text" name="id" ng-model="eventID">
										<div class="form-group">
											<label for="title" class="col-sm-2 control-label">Título: </label>
										  <div class="col-sm-10">
										     <input type="text" class="form-control" name="title" placeholder="Título del evento..." ng-model="eventTitle" required>
										   </div>
										</div>
										<div class="form-group">
											<label for="date" class="col-sm-2 control-label">Fecha a realizarse: </label>
										  <div class="col-sm-10">
										  	<input type="date" class="form-control" name="date" placeholder="2012-12-12" ng-model="eventDate" required>
										   </div>
										</div>
										<div class="form-group">
											<div class="checkbox">
												<label class="col-sm-10 col-sm-offset-2">
													<input type="checkbox" id="toFile2">Modificar el archivo
												</label>
											</div>
										</div>
										<div id="divFile2" class="form-group hide">
										  <label for="file" class="col-sm-2 control-label">Archivo:</label>
										  <div class="col-sm-10">
										    <input type="file" class="form-control" name="file">
										  </div>
										</div>
										<div class="form-group">
										  <div class="checkbox">
												<label class="col-sm-10 col-sm-offset-2">
												  <input type="checkbox" id="toImg2">Modificar la imagen
												</label>
											</div>
										</div>
										<div id="divImg2" class="form-group hide">
										  <label for="img" class="col-sm-2 control-label">Imagen:</label>
										  <div class="col-sm-10">
										    <input type="file" class="form-control" name="img" accept="image/*">
										  </div>
										</div>
										<div class="form-group">
											<label for="contenido" class="col-sm-2 control-label">Contenido: </label>
										  <div class="col-sm-10">
										  	<textArea id="eventTextArea" type="text" class="form-control textarea" name="content" ng-model="eventContent"></textArea>
										   </div>
										</div>
										<div class="form-group">
											<label for="category" class="col-sm-2 control-label">Sede:</label>
										  <div class="col-sm-10">
										  	<select class="form-control" name="sede">
													@foreach ($sedes as $sede)
														<option value="{{ $sede->id }}" ng-selected="{{ $sede->id }} == eventSede">{{ $sede->name }}</option>
													@endforeach
												</select>
										  </div>
										</div>
										<div class="form-group">
											<label for="org" class="col-sm-2 control-label">Organizador: </label>
										  <div class="col-sm-10">
										     <input type="text" class="form-control" name="org" placeholder="Organizador del evento... Puede dejarlo vacío si usted es el organizador" ng-model="eventOrg">
										   </div>
										</div>
										<br>
										<div class="form-group">
							    		<label for="password" class="col-sm-2 text-danger control-label">Contraseña:</label>
							    		<div class="col-sm-10">
							      		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña...">
							      		<p class="help-block">Debe ingresar su contraseña para poder modificar eventos.</p>
							    		</div>
							  		</div>
					      	</div>
					      	<div class="modal-footer">
					        	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> &nbsp;Cerrar</button>
					        	<button type="submit" class="btn btn-warning btn-sm">Modificar</button>
					      	</div>
							</form>
							<!-- Termina el formulario -->
				    </div>
				  </div>
				</div>
				<!-- Modal eliminar -->
				<div class="modal fade" id="modalEliminarEvento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				  	<form class="form-horizontal" action="{{ route('eventos.delete') }}" method="POST">
				    	<div class="modal-content">
				      	<div class="modal-header text-center">
				        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        	<h4>¿Desea eliminar el evento?</h4>
				      	</div>
				      	<div class="modal-body">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input class="hide" type="text" name="id" ng-model="eventID">
									<input class="form-control hidden" type="text" name="url" value="{{ url()->current() }}">
				      		<br>
					      	<div class="form-group">
							    	<label for="password" class="col-sm-2 control-label text-danger">Contraseña: </label>
							    	<div class="col-sm-10">
							   	  	<input type="password" class="form-control" name="password" placeholder="Digite su contraseña..." required>
							   	  	<p class="help-block">Debe ingresar su contraseña para poder eliminar eventos.</p>
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

				<!-- Modal ver -->
				<div class="modal fade" id="modalVerEvento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog modal-lg" role="document">
				  	<div class="modal-content">
			      	<div class="modal-header text-center">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4> @{{eventTitle}}</h4>
			      	</div>
			      	<div class="modal-body">
				      	<p ng-bind-html="renderHtml(eventContent)"></p>
						  </div>
					    <div class="modal-footer">
					      <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> &nbsp;Cerrar</button>
					    </div>
					  </div>
				  </div>
				</div>

		</div>
	</div>
	<script src="{{ asset('js/adminScripts/eventoController.js') }}"></script>
	<script src="{{ asset('js/js_resources/trumbowyg/trumbowyg.min.js') }}"></script>
	<script src="{{ asset('js/js_resources/trumbowyg/langs/es.min.js') }}"></script>

@include('admin.partials.footer')
