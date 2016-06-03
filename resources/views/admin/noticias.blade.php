@include('admin.partials.head')
@include('admin.partials.nav')
	@include('admin.partials.aside')

 <!-- contenedor principal -->
		<div class="col-xs-12 col-sm-9 col-md-10 col-xl-11" id="main-container">
			
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
						   	 		<form class="form-horizontal">
						   	 			<div class="text-center">
						   	 				<h4>Agregar Noticia</h4>
						   	 			</div>
						   	 			<br>
						   	 		<div class="form-group">
									   		<label for="title" class="col-sm-2 control-label">Título: </label>
									    	<div class="col-sm-10">
									     		<input type="text" class="form-control" name="title" placeholder="Título de la noticia...">
									   	</div>
									  	</div>
						   	 		<div class="form-group">
									    	<label for="file" class="col-sm-2 control-label">Archivo:</label>
									    	<div class="col-sm-10">
									      		<input type="file" class="form-control" name="file">
									    	</div>
									  	</div>
									  	<div class="form-group">
									    	<label for="img" class="col-sm-2 control-label">Imagen:</label>
									    	<div class="col-sm-10">
									      		<input type="file" class="form-control" name="img" >
									    	</div>
									  	</div>
									  	<div class="form-group">
									   		<label for="contenido" class="col-sm-2 control-label">Contenido: </label>
									    	<div class="col-sm-10">
									     		<textArea type="text" class="form-control" name="contenido" ></textArea>
									   	 	</div>
									  	</div>
									  	<div class="form-group">
									   		<label for="autor" class="col-sm-2 control-label">Autor: </label>
									    	<div class="col-sm-10">
									     		<input type="text" class="form-control" name="autor" placeholder="Autor de la noticia...">
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
					  		<input type="search" class="form-control" placeholder="Buscar noticia..."></input>
					  		<table class="table table-hover">
								<thead>
								  	<th>Título</th>
								  	<th>Noticia</th>
								  	<th>Autor</th>
								  	<th>Publicado por</th>
								  	<th class="hidden-xs">Fecha de publicación</th>
								  	<th class="hidden-xs">Fecha de modificación</th>
									<th></th>
								 </thead>
								 <tbody>
							  		<tr>
							  			<td>titulo</td>
							  			<td> 
							  				<a data-toggle="modal" data-target="#modalVerNoticia"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a> 
							  			</td>
							  			<td>Autor</td>
							  			<td>Wendy </td>
							  			<td class="hidden-xs">12/12/1222</td>
							  			<td class="hidden-xs">12/12/1222</td>
							  			<td>
							  				<a data-toggle="modal" data-target="#modalModificarNoticia" class="btn btn-xs btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>

							  				<a data-toggle="modal" data-target="#modalEliminarNoticia" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
				        <form class="form-horizontal">
				      		<div class="modal-body">
							  	<div class="form-group">
									   		<label for="title" class="col-sm-2 control-label">Título: </label>
									    	<div class="col-sm-10">
									     		<input type="text" class="form-control" name="title" placeholder="Título de la noticia...">
									   	</div>
									  	</div>
						   	 		<div class="form-group">
									    	<label for="file" class="col-sm-2 control-label">Archivo:</label>
									    	<div class="col-sm-10">
									      		<input type="file" class="form-control" name="file">
									    	</div>
									  	</div>
									  	<div class="form-group">
									    	<label for="img" class="col-sm-2 control-label">Imagen:</label>
									    	<div class="col-sm-10">
									      		<input type="file" class="form-control" name="img" >
									    	</div>
									  	</div>
									  	<div class="form-group">
									   		<label for="contenido" class="col-sm-2 control-label">Contenido: </label>
									    	<div class="col-sm-10">
									     		<textArea type="text" class="form-control" name="contenido" ></textArea>
									   	 	</div>
									  	</div>
									  	<div class="form-group">
									   		<label for="autor" class="col-sm-2 control-label">Autor: </label>
									    	<div class="col-sm-10">
									     		<input type="text" class="form-control" name="autor" placeholder="Autor de la noticia...">
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
				  	 	<form class="form-horizontal">
				    		<div class="modal-content">
				      		<div class="modal-header text-center">
				        			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        			<h4>¿Desea eliminar la noticia ++NombreDelaNoticia++?</h4>
				      		</div>
				      		<div class="modal-body">
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
				        			<button type="button" class="btn btn-danger btn-sm">Eliminar</button>
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
			      		</div>
			      		<div class="modal-body">
				      		... Aqui va todo el contenido de la noticia ...
						   </div> 		
					      <div class="modal-footer">
					        	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
					      </div>
					   </div>
				   </div>
				</div>

		</div>
	</div>
@include('admin.partials.footer')