@include('admin.partials.head')
@include('admin.partials.nav')
	@include('admin.partials.aside')
 <!-- contenedor principal -->
		<div class="col-xs-12 col-sm-9 col-md-10 col-xl-11" id="main-container">
			
				<!-- panel repositorio -->
				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading p5"> 
							<h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-file-text" aria-hidden="true">
								</i>&nbsp;&nbsp; Repositorio / tipoArchivos  <a class="pull-right white"><i class="fa fa-plus-circle fa-lg " id="btnAddUsersToogle" aria-hidden="true" data-toggle="collapse" data-target="#collapseAgregarArchivo" aria-expanded="false" aria-controls="collapseExample"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
							</h4>  
						</div>
						<!-- Agregar archivo -->
						<div class="collapse row" id="collapseAgregarArchivo">
						   	 	<div class="col-xs-12 col-md-6 col-md-offset-3 col-xl-4 col-xl-offset-4">
						   	 		<br>
						   	 		<ul class="nav nav-tabs nav-justified">
									  	<li role="presentation" class="active"><a href="#">Agregar Archivo</a></li>
										<li role="presentation"><a href="#">Agregar Categoria</a></li>
									</ul>
						   	 		<form class="form-horizontal">
						   	 			<br>
						   	 			<div class="form-group">
									    	<label for="file" class="col-sm-2 control-label">Archivo:</label>
									    	<div class="col-sm-10">
									      		<input type="file" class="form-control" name="file">
									    	</div>
									  	</div>
									  	<div class="form-group">
									   		<label for="title" class="col-sm-2 control-label">Título: </label>
									    	<div class="col-sm-10">
									     		<input type="text" class="form-control" name="title" placeholder="Título...">
									   	 	</div>
									  	</div>
									  	<div class="form-group">
									    	<label for="category" class="col-sm-2 control-label">Categoria:</label>
									    	<div class="col-sm-10">
									    	  	<select class="form-control" name="category">
												  	<option>1</option>
												  	<option>2</option>
												  	<option>3</option>
												  	<option>4</option>
												  	<option>5</option>
												</select>
									    	</div>
									  	</div>
									  	<div class="form-group">
									   		<label for="resumen" class="col-sm-2 control-label">Resumen: </label>
									    	<div class="col-sm-10">
									     		<textArea type="text" class="form-control" name="resumen" ></textArea>
									   	 	</div>
									  	</div>
									  	<br>
									  	<div class="form-group">
									    	<div class="col-sm-offset-2 col-sm-10">
									      		<button type="submit" class="btn btn-primary btn-sm">Agregar</button>
									    	</div>
									  	</div>
									</form>

									<form class="form-horizontal">
						   	 			<br>
									  	<div class="form-group">
									   		<label for="title" class="col-sm-2 control-label">Título: </label>
									    	<div class="col-sm-10">
									     		<input type="text" class="form-control" name="title" placeholder="Título...">
									   	 	</div>
									  	</div>
									  
									  	<div class="form-group">
									   		<label for="color" class="col-sm-2 control-label">Resumen: </label>
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
									</form>
						   	 	</div>
						</div>
					  	<div class="panel-body" >
					  		<input type="search" class="form-control" placeholder="Buscar archivo..."></input>
					  		<table class="table table-hover">
								<thead>
								  	<th>Nombre</th>
								  	<th>Título</th>
								  	<th>Categoría</th>
								  	<th class="hidden-xs">Resumen / Palabras</th>
								  	<th class="hidden-xs hidden-sm">Subido por</th>
								  	<th class="hidden-xs hidden-sm">Fecha de subida</th>
								  	<th class="hidden-xs hidden-sm hidden-md">Fecha modificación</th>
								  	<th>Descarga</th>
								  	<th></th>
								 </thead>
								 <tbody>
							  		<tr>
							  			<td>Nombre</td>
									  	<td>Título</td>
									  	<td>Categoría</td>
									  	<td class="hidden-xs">Resumen / Palabras</td>
									  	<td class="hidden-xs hidden-sm">Subido por</td>
									  	<td class="hidden-xs hidden-sm">Fecha de subida</td>
									  	<td class="hidden-xs hidden-sm hidden-md">Fecha modificación</td>
									  	<td><a href=""><i class="fa fa-download" aria-hidden="true"></i></a></td>
							  			<td>
							  				<a data-toggle="modal" data-target="#modalModificarArchivo" class="btn btn-xs btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>

							  				<a data-toggle="modal" data-target="#modalEliminarArchivo" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							  			</td>
							  		</tr>
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
				        		<h4 class="modal-title" id="myModalLabel">Modificar Archivo</h4>
				      		</div>
				      	<!-- inicia el formulario -->
				        <form class="form-horizontal">
				      		<div class="modal-body">
							  	<div class="form-group">
							    	<label for="title" class="col-sm-2 control-label">Título:</label>
							    	<div class="col-sm-10">
							      		<input type="text" class="form-control" name="title" placeholder="Título...">
							    	</div>
							  	</div>
							  	<div class="form-group">
							    	<label for="resumen" class="col-sm-2 control-label">Resumen:</label>
							    	<div class="col-sm-10">
							    	  	<textArea type="textArea" class="form-control" name="resumen"> +ResumenPalabras+
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
										  	<option>1</option>
										  	<option>2</option>
										  	<option>3</option>
										  	<option>4</option>
										  	<option>5</option>
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
				  	 <form class="form-horizontal">
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4>¿Desea eliminar el archivo ++NombreDelArchivo++?</h4>
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
				        	<button type="button" class="btn btn-danger btn-sm">Eliminar</button>
				      	</div>
				    </div>
				   </form>
				  </div>
				</div>
		</div>
	</div>
@include('admin.partials.footer')
