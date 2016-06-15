@include('admin.partials.head')
@include('admin.partials.nav')
	@include('admin.partials.aside')
 <!-- contenedor principal -->
		<div class="col-xs-12 col-sm-9 col-md-10 col-xl-11" id="main-container" ng-app="App" ng-controller="repositorioController" ng-init="archivos= {{ $archivos }}; categorias={{ $categorias}}; users={{ $users }}; userID={{ Auth::user()->id }}; userType= <?php if(null !== Auth::user()->userType){ echo Auth::user()->userType;  }else{ echo "0";} ?>" >
			
				<!-- panel repositorio -->
				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading p5"> 
							<h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-file-text" aria-hidden="true">
								</i>&nbsp;&nbsp; Repositorio / tipoArchivos<a class="pull-right white "><i class="fa fa-plus-circle fa-lg " id="btnAddUsersToogle" aria-hidden="true" data-toggle="collapse" data-target="#collapseAgregarArchivo" aria-expanded="false" aria-controls="collapseExample"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
							</h4>  
						</div>
						<!-- Agregar archivo -->
						<div class="collapse row" id="collapseAgregarArchivo">
						   	 	<div class="col-xs-12 col-md-6 col-md-offset-3 col-xl-4 col-xl-offset-4">
						   	 		<br id="hiddenStateRepo" stateIndex="1">
						   	 		<ul class="nav nav-tabs nav-justified">
									  	<li role="presentation" class="active"><a class="btnRepo1" href="#">Agregar Archivo </a></li>
										<li role="presentation"><a class="btnRepo2" href="#">Agregar Categoria</a></li>
										<li role="presentation"><a class="btnRepo3" href="#">Eliminar Categoria</a></li>
									</ul>
									{!! Form::open(array('route'=>'repositorio.store','method'=>'POST', 'files'=>true , 'class' => 'form-horizontal form1Repo')) !!}
										@if( count($categorias) > 0 )
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
						   	 			<br>
						   	 			<div class="form-group">
									    	<label for="file" class="col-sm-3 control-label">Archivo:</label>
									    	<div class="col-sm-9">
									      		<input type="file" class="form-control" name="file">
									    	</div>
									  	</div>
									  	<div class="form-group">
									   		<label for="title" class="col-sm-3 control-label">Título: </label>
									    	<div class="col-sm-9">
									     		<input type="text" class="form-control" name="title" placeholder="Título...">
									   	 	</div>
									  	</div>
									  	<div class="form-group">
									    	<label for="category" class="col-sm-3 control-label">Categoria:</label>
									    	<div class="col-sm-9">
									    	  	<select class="form-control" name="category">
									     			@foreach($categorias as $x)
														<option value="{{ $x->id }}">{{ $x->name }}</option>
									     			@endforeach
									     		</select>
									    	</div>
									  	</div>
									  	<div class="form-group">
									    	<label for="editable" class="col-sm-3 control-label">Es editable:</label>
									    	<div class="col-sm-9">
									    	  	<input type="checkbox" name="editable"></input>
									    	</div>
									  	</div>
									  	<div class="form-group">
									   		<label for="resumen" class="col-sm-3 control-label">Resumen: </label>
									    	<div class="col-sm-9">
									     		<textArea type="text" class="form-control" name="resumen" ></textArea>
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
												<h4>Debe incluir una categoria para agregar archivos al repositorio. </h4>
											</div>
											<br><br><br><br><br><br><br><br>
									  	@endif
									</form>
									<!-- form close -->

									<!-- form open categoria agregar -->
									<form action="{{ route('categoria.store') }}" method="POST" class="form-horizontal form2Repo hide">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
						   	 			<br><br>
									  	<div class="form-group">
									   		<label for="name" class="col-sm-2 control-label">Nombre: </label>
									    	<div class="col-sm-10">
									     		<input type="text" class="form-control" name="name" placeholder="Nombre...">
									   	 	</div>
									  	</div>
									  
									  	<div class="form-group">
									   		<label for="color" class="col-sm-2 control-label">Color: </label>
									    	<div class="col-sm-10">
									     		<input type="color" value="rgb(128,0,0);" class="form-control" name="color">
									   	 	</div>
									  	</div>
									  	<br>
									  	<div class="form-group">
									    	<div class="col-sm-offset-2 col-sm-10">
									      		<button type="submit" class="btn btn-primary btn-sm">Agregar</button>
									    	</div>
									  	</div>
									  	<br><br><br><br><br>
									</form>

									<!-- form open categoria eliminar -->
									<form method="post" action="{{ route('categoria.delete') }}" class="form-horizontal form3Repo hide">
										@if( count($categorias) > 0 )
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
						   	 			<br><br>
									  	<div class="form-group">
									   		<label for="name" class="col-sm-2 control-label">Nombre: </label>
									    	<div class="col-sm-10">
									     		<select class="form-control" name="id">
									     			@foreach($categorias as $x)
														<option value="{{ $x->id }}">{{ $x->name }}</option>
									     			@endforeach
									     		</select>
									   	 	</div>
									  	</div>
									  	<br><br>
									  	<div class="form-group">
									    	<div class="col-sm-offset-2 col-sm-10">
									      		<button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
									    	</div>
									  	</div>
									  	<br><br><br><br><br><br>
									  	@else
											<br><br><br><br><br>
											<div class="text-center">
												<h4> No hay categorias para eliminar. </h4>
											</div>
											<br><br><br><br><br><br><br><br>
									  	@endif
									</form>
						   	 	</div>
						</div>
					  	<div class="panel-body" >
					  		<input type="search" class="form-control" placeholder="Buscar archivo..." ng-model="searchFile"></input>
					  		<table class="table table-hover">
								<thead>
								  	<th ng-click="myOrder = 'name' ">Nombre</th>
								  	<th ng-click="myOrder = 'title' ">Título</th>
								  	<th ng-click="myOrder = 'categoria_id' ">Categoría</th>
								  	<th ng-click="myOrder = 'keyWords' " class="hidden-xs">Resumen / Palabras</th>
								  	<th ng-click="myOrder = 'user_id' " class="hidden-xs hidden-sm">Subido por</th>
								  	<th ng-click="myOrder = 'created_at' " class="hidden-xs hidden-sm">Fecha de subida</th>
								  	<th ng-click="myOrder = 'updated_at' " class="hidden-xs hidden-sm hidden-md">Fecha modificación</th>
								  	<th>Descargar</th>
								  	<th></th>
								 </thead>
								 <tbody>
								 @if(isset($archivos))
							  		<tr ng-repeat="x in archivos | filter : searchFile | orderBy : myOrder" >
							  			<td> @{{ x.name }}</td>
									  	<td> @{{ x.title }}</td>
									  	<td ng-repeat="y in categorias" ng-if=" x.categoria_id == y.id "> 
									  		<span>
									  			@{{ y.name }}
									  		</span>
									  	</td>
									  	<td class="hidden-xs"> @{{ x.keyWords }} </td>
									  	<td class="hidden-xs hidden-sm" ng-repeat="u in users" ng-if="u.id == x.user_id"> 
									  		<span>@{{ u.name }}</span>
									  	</td>
									  	<td class="hidden-xs hidden-sm"> @{{ x.created_at }} </td>
									  	<td class="hidden-xs hidden-sm hidden-md"> @{{ x.updated_at }} </td>
									  	<td >
									  		<a href="/file/getRepositorio/@{{ x.file_route }}"><i class="fa fa-download" aria-hidden="true"></i></a>
									  	</td>
							  			<td ng-if="x.user_id == userID || userType == 1">
							  				<a ng-if="x.editable != null" ng-click="setEdit( x.id , x.name , x.title , x.keyWords, x.categoria_id, x.file_route)" data-toggle="modal" data-target="#modalModificarArchivo" class="btn btn-xs btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>

							  				<a ng-click="setFileValues( x.id , x.name , x.user_id , x.file_route)" data-toggle="modal" data-target="#modalEliminarArchivo" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							  			</td>
							  		</tr>
							  	@endif
								</tbody>
							</table>
					 	</div>
					</div>
				</div>

				<!-- Modal Modificar -->
				<div class="modal fade" id="modalModificarArchivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4 class="modal-title" id="myModalLabel">Modificar @{{fileName}}</h4>
				      		</div>
				      	<!-- inicia el formulario -->
						{!! Form::open(array('route'=>'repositorio.updateData','method'=>'POST', 'files'=>true , 'class' => 'form-horizontal')) !!}
				        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input class="hide" type="text" name="id" ng-model="fileID">
							<input class="hide" type="text" name="url" ng-model="fileUrl">
				      		<div class="modal-body">
							  	<div class="form-group">
							    	<label for="title" class="col-sm-2 control-label">Título:</label>
							    	<div class="col-sm-10">
							      		<input type="text" class="form-control" name="title" ng-model="fileTitle">
							    	</div>
							  	</div>
							  	<div class="form-group">
							    	<label for="resumen" class="col-sm-2 control-label">Resumen:</label>
							    	<div class="col-sm-10">
							    	  	<textArea type="textArea" class="form-control" name="resumen">@{{ fileKeyWords }}
							    	  	</textArea>
							    	</div>
							  	</div>
							  	<div class="form-group">
							    	<label for="file" class="col-sm-2 control-label">Archivo:</label>
							    	<div class="col-sm-10">
							      		<input type="file" class="form-control" name="file">
							    	</div>
							  	</div>
							  	<div class="form-group">
							    	<label for="category" class="col-sm-2 control-label">Categoria:</label>
							    	<div class="col-sm-10">
							    	  	<select class="form-control" name="category">
							    	  		<option value="@{{ fileCategoryID }}"></option>
											<option ng-repeat="y in categorias" value="@{{ y.id }}">@{{ y.name }}</option> 
										</select>
							    	</div>
							  	</div>
							  	<br>
							  	<div class="form-group">
							    	<label for="password" class="col-sm-2 text-danger control-label">Contraseña:</label>
							    	<div class="col-sm-10">
							      		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña...">
							      		<p class="help-block">Debe ingresar su contraseña para poder modificar archivos.</p>
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
				<div class="modal fade" id="modalEliminarArchivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				  	 <form class="form-horizontal" action="{{ route('repositorio.delete') }}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input class="hide" type="text" name="id" ng-model="fileID">
						<input class="hide" type="text" name="userFileID" ng-model="userFileID">
						<input class="hide" type="text" name="fileUrl" ng-model="fileUrl">
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4>¿Desea eliminar el archivo <strong>@{{fileName}} </strong> ?</h4>
				      		</div>
				      		<div class="modal-body">
				      			<br>
					      		<div class="form-group">
							    	<label for="password" class="col-sm-2 control-label text-danger">Contraseña: </label>
							    	<div class="col-sm-10">
							   	  	<input type="password" class="form-control" name="password" placeholder="Digite su contraseña..."> 
							   	  	<p class="help-block">Debe ingresar su contraseña para poder eliminar archivos.</p>
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
		</div>
	</div>
<script src="{{ asset('js/adminScripts/repositorioController.js') }}"></script>
@include('admin.partials.footer')
