@include('admin.partials.head')
<link rel="stylesheet" href="{{ asset('js/js_resources/trumbowyg/ui/trumbowyg.min.css') }}" />
@include('admin.partials.nav')
	@include('admin.partials.aside')

 <!-- contenedor principal -->
		<div class="col-xs-12 col-sm-9 col-md-10 col-xl-11" id="main-container" ng-app="App" ng-controller="noticiasController" ng-init="noticias = {{ $noticias }}">

				<!-- panel noticias -->
				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading p2">
							<h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp;&nbsp; Noticias <a class="pull-right white"><i class="fa fa-plus-circle fa-lg " id="btnAddUsersToogle" aria-hidden="true" data-toggle="collapse" data-target="#collapseAgregarArchivo" aria-expanded="false" aria-controls="collapseExample"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
							</h4>
						</div>
						<!-- Agregar noticia -->
						<div class="collapse row" id="collapseAgregarArchivo">
						   	 	<div class="col-xs-12 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
						   	 		{!!  Form::open(array('route'=>'noticias.storeNoticia','method'=>'POST', 'files'=>true , 'class' => 'form-horizontal'))  !!}
						   	 			<div class="text-center">
						   	 				<h4>Agregar Noticia</h4>
						   	 			</div>
						   	 			<br>
						   	 		<div class="form-group">
									   		<label for="title" class="col-sm-2 control-label">Título: </label>
									    	<div class="col-sm-10">
									     		<input type="text" class="form-control" name="title" placeholder="Título de la noticia..." required>
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
									      		<input type="file" class="form-control" name="img" accept="image/x-png, image/gif, image/jpeg">
									    	</div>
									  	</div>
									  	<div class="form-group">
									   		<label for="contenido" class="col-sm-2 control-label">Contenido: </label>
									    	<div class="col-sm-10">
									     		<textarea type="text" class="form-control" name="content" required></textarea>
									   	 	</div>
									  	</div>
									  	<div class="form-group">
									   		<label for="autor" class="col-sm-2 control-label">Autor: </label>
									    	<div class="col-sm-10">
									     		<input type="text" class="form-control" name="author" placeholder="Autor de la noticia...">
									   	</div>
									  	</div>
									  	<br>
									  	<div class="form-group">
									    	<div class="col-sm-offset-2 col-sm-10">
									      		<button type="submit" class="btn btn-primary btn-sm">Agregar</button>
									    	</div>
									  	</div>
									</form>
						   	 	</div>
						</div>
					  	<div class="panel-body" >
					  		<input ng-model="searchNoticia" type="search" class="form-control" placeholder="Buscar noticia..."></input>
					  		<table class="table table-hover">
								<thead>
								  	<th ng-click="myOrderActive = 'title'">Título</th>
								  	<th>Noticia</th>
								  	<th ng-click="myOrderActive = 'auth'">Autor</th>
								  	<th>Publicado por</th>
								  	<th class="hidden-xs" ng-click="myOrderActive = 'created_at'">Fecha de publicación</th>
								  	<th class="hidden-xs" ng-click="myOrderActive = 'updated_at'">Fecha de modificación</th>
									<th></th>
								 </thead>
								 <tbody>
							  		<tr ng-repeat=" x in noticias | filter : searchNoticia | orderBy : myOrderActive">
							  			<td>@{{ x.title }}</td>
							  			<td>
							  				<a ng-click="setNewsValues( x.id , x.title, x.content )" data-toggle="modal" data-target="#modalVerNoticia"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>
							  			</td>
							  			<td>@{{ x.auth }}</td>
							  			<td>@{{ x.user_id }}</td>
							  			<td class="hidden-xs">@{{ x.created_at }}</td>
							  			<td class="hidden-xs">@{{ x.updated_at }}</td>
							  			<td>
							  				<a ng-click="setEdit( x.id , x.title , x.content , x.auth )" data-toggle="modal" data-target="#modalModificarNoticia" class="btn btn-xs btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>

							  				<a ng-click="setNewsValues( x.id , x.title )" data-toggle="modal" data-target="#modalEliminarNoticia" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							  			</td>
							  		</tr>
								</tbody>
							</table>
					 	</div>
					</div>
				</div>

				<!-- Modal Modificar -->
				<div class="modal fade" id="modalModificarNoticia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog modal-lg" role="document">
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4 class="modal-title" id="myModalLabel">Modificar Noticia</h4>
				      		</div>
				      	<!-- inicia el formulario -->
				        {!! Form::open(array('route'=>'noticias.updateNoticia','method'=>'POST', 'files'=>true , 'class' => 'form-horizontal')) !!}
				      		<div class="modal-body">
										<input class="hide" type="text" name="id" ng-model="newsID">
							  	<div class="form-group">
									   		<label for="title" class="col-sm-2 control-label">Título: </label>
									    	<div class="col-sm-10">
									     		<input type="text" class="form-control" name="title" placeholder="Título de la noticia..." ng-model="newsTitle" required>
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
									      		<input type="file" class="form-control" name="img">
									    	</div>
									  	</div>
									  	<div class="form-group">
									   		<label for="contenido" class="col-sm-2 control-label">Contenido: </label>
									    	<div class="col-sm-10">
									     		<textarea id="newsTextarea" type="text" class="form-control" name="content" ng-model="newsContent" required></textarea>
									   	 	</div>
									  	</div>
									  	<div class="form-group">
									   		<label for="autor" class="col-sm-2 control-label">Autor: </label>
									    	<div class="col-sm-10">
									     		<input type="text" class="form-control" name="author" placeholder="Autor de la noticia..."  ng-model="newsAuth">
									   	</div>
									  	</div>
							  	<br>
							  	<div class="form-group">
							    	<label for="password" class="col-sm-2 text-danger control-label">Contraseña:</label>
							    	<div class="col-sm-10">
							      		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña...">
							      		<p class="help-block">Debe ingresar su contraseña para poder modificar noticias.</p>
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
				<div class="modal fade" id="modalEliminarNoticia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				  	 	<form class="form-horizontal" action="{{ route('noticias.delete') }}" method="POST">
				    		<div class="modal-content">
				      		<div class="modal-header text-center">
				        			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        			<h4>¿Desea eliminar la noticia?</h4>
				      		</div>
				      		<div class="modal-body">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input class="hide" type="text" name="id" ng-model="newsID">
										<input class="form-control hidden" type="text" name="url" value="{{ url()->current() }}">
				      			<br>
					      		<div class="form-group">
							    		<label for="password" class="col-sm-2 control-label text-danger">Contraseña: </label>
							    		<div class="col-sm-10">
							   	  		<input type="password" class="form-control" name="password" placeholder="Digite su contraseña...">
							   	  		<p class="help-block">Debe ingresar su contraseña para poder eliminar noticias.</p>
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

				<!-- Modal Ver -->
				<div class="modal fade" id="modalVerNoticia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog modal-lg" role="document">
				  		<div class="modal-content">
			      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4> @{{newsTitle}}</h4>
			      		</div>
			      		<div class="modal-body">
				      		<p ng-bind-html="renderHtml(newsContent)"></p>
						   </div>
					      <div class="modal-footer">
					        	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
					      </div>
					   </div>
				   </div>
				</div>

		</div>
	</div>
	<script src="{{ asset('js/adminScripts/noticiaController.js') }}"></script>
	<script src="{{ asset('js/js_resources/trumbowyg/trumbowyg.min.js') }}"></script>
	<script src="{{ asset('js/js_resources/trumbowyg/langs/es.min.js') }}"></script>

@include('admin.partials.footer')
