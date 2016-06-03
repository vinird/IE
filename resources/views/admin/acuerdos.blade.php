@include('admin.partials.head')
@include('admin.partials.nav')
	@include('admin.partials.aside')

 <!-- contenedor principal -->
		<div class="col-xs-12 col-sm-9 col-md-10 col-xl-11" id="main-container">
			
				<!-- panel acuerdos  -->
				<div class="clearfix"></div>
				<div class="col-xs-12 col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading p0"> 
							<h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check-square" aria-hidden="true">
								</i>&nbsp;&nbsp; Mis acuerdos <a class="pull-right white btnAddAcuerdoToogle"><i class="fa fa-plus-circle fa-lg " id="btnAddUsersToogle" aria-hidden="true" data-toggle="collapse" data-target="#collapseAgregarArchivo" aria-expanded="false" aria-controls="collapseExample"></i></a>&nbsp;&nbsp;&nbsp;&nbsp; 
							</h4>  
						</div>
						<!-- Agregar acuerdo -->
						<div class="collapse row" id="collapseAgregarArchivo">
						   	 	<div class="col-xs-12">
						   	 		<form class="form-horizontal">
						   	 			<div class="text-center">
						   	 				<h4>Agregar Acuerdo</h4>
						   	 			</div>
						   	 			<br>
						   	 			<div class="form-group">
									   		<label for="title" class="col-sm-2 control-label">Título: </label>
									    	<div class="col-sm-10">
									     		<input type="text" class="form-control" name="title" placeholder="Título del acuerdo...">
									   		</div>
									  	</div>
									  	<div class="form-group">
									   		<label for="contenido" class="col-sm-2 control-label">Descripción: </label>
									    	<div class="col-sm-10">
									     		<textArea type="text" class="form-control" name="contenido" ></textArea>
									   	 	</div>
									  	</div>
										<div class="form-group">
									   		<label for="date" class="col-sm-2 control-label">Fecha límite: </label>
									    	<div class="col-sm-10">
									     		<input type="date" class="form-control" name="date" placeholder="2012-12-12">
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
							<div class="col-xs-12 ">
								<div class="panel panel-default boxAcuerdos">
									<div class="panel-heading p pAcuerdos"> 
										<h4>
											Título del acuerdo 
											<a data-toggle="modal" data-target="#modalFinalizarAcuerdo" class="pull-right"><i class="fa fa-check" aria-hidden="true"></i></a> &nbsp;&nbsp; 
											<a data-toggle="modal" data-target="#modalEliminarAcuerdo" class="pull-right"><i class="fa fa-trash" aria-hidden="true"></i></a>
										</h4>   
										<s><h5>Fecha límite <span>12/12/1222</span></h5></s>
									</div>
								  	<div class="panel-body text-justify" >
								  		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								  		<a data-toggle="modal" data-target="#modalModificarAcuerdo"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								 	</div>
								 	<div class="panel-footer p0 pAcuerdos" >
								 	</div>
								</div>
							</div>
							<!-- /// -->
					  		<div class="col-xs-12 ">
								<div class="panel panel-default boxAcuerdos">
									<div class="panel-heading p7 pAcuerdos"> 
										<h4>
											Título del acuerdo 
											<a data-toggle="modal" data-target="#modalFinalizarAcuerdo" class="pull-right"><i class="fa fa-check" aria-hidden="true"></i></a> &nbsp;&nbsp; 
											<a data-toggle="modal" data-target="#modalEliminarAcuerdo" class="pull-right"><i class="fa fa-trash" aria-hidden="true"></i></a>
										</h4>  
										<h5 class="passDate animated flash">Fecha límite <span>12/12/1222</span></h5>
									</div>
								  	<div class="panel-body text-justify" >
								  		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								  		<a data-toggle="modal" data-target="#modalModificarAcuerdo"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								 	</div>
								 	<div class="panel-footer p0 pAcuerdos" >
								 	</div>
								</div>
							</div>
							<!-- /// -->		
							<div class="clearfix"></div>
							<div class="col-xs-12">
								<div class="panel panel-default boxAcuerdos">
									<div class="panel-heading p2 pAcuerdos"> 
										<h4>
											Título del acuerdo 
											<a data-toggle="modal" data-target="#modalFinalizarAcuerdo" class="pull-right"><i class="fa fa-check" aria-hidden="true"></i></a> &nbsp;&nbsp; 
											<a data-toggle="modal" data-target="#modalEliminarAcuerdo" class="pull-right"><i class="fa fa-trash" aria-hidden="true"></i></a>
										</h4>  
										<h5>Fecha límite <span>12/12/1222</span></h5>
									</div>
								  	<div class="panel-body text-justify" >
								  		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								  		<a data-toggle="modal" data-target="#modalModificarAcuerdo"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								 	</div>
								 	<div class="panel-footer p0 pAcuerdos" >
								 	</div>
								</div>
							</div>
							<!-- /// -->
							<div class="col-xs-12">
								<div class="panel panel-default boxAcuerdos">
									<div class="panel-heading p4 pAcuerdos"> 
										<h4>
											Título del acuerdo 
											<a data-toggle="modal" data-target="#modalFinalizarAcuerdo" class="pull-right"><i class="fa fa-check" aria-hidden="true"></i></a> &nbsp;&nbsp; 
											<a data-toggle="modal" data-target="#modalEliminarAcuerdo" class="pull-right"><i class="fa fa-trash" aria-hidden="true"></i></a>
										</h4>  
										<h5>Fecha límite <span>12/12/1222</span></h5>
									</div>
								  	<div class="panel-body text-justify" >
								  		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								  		<a data-toggle="modal" data-target="#modalModificarAcuerdo"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								 	</div>
								 	<div class="panel-footer p0 pAcuerdos" >
								 	</div>
								</div>
							</div>
							<!-- /// -->
							<div class="col-xs-12">
								<div class="panel panel-default boxAcuerdos">
									<div class="panel-heading p4 pAcuerdos"> 
										<h4>
											Título del acuerdo 
											<a data-toggle="modal" data-target="#modalFinalizarAcuerdo" class="pull-right"><i class="fa fa-check" aria-hidden="true"></i></a> &nbsp;&nbsp; 
											<a data-toggle="modal" data-target="#modalEliminarAcuerdo" class="pull-right"><i class="fa fa-trash" aria-hidden="true"></i></a>
										</h4>  
										<h5>Fecha límite <span>12/12/1222</span></h5>
									</div>
								  	<div class="panel-body text-justify" >
								  		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								  		<a data-toggle="modal" data-target="#modalModificarAcuerdo"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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
				<div class="col-xs-12 col-md-8 acuerdosGenerales">
					<div class="panel panel-default">
						<div class="panel-heading p5"> <h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;&nbsp; Acuerdos Generales  </h4>  </div>
					  	<div class="panel-body" >
					  		<input type="search" class="form-control" placeholder="Buscar acuerdos..."></input>
					  		<!-- /// -->
							<div class="col-xs-12">
								<div class="panel panel-default boxAcuerdos">
									<div class="panel-heading pAcuerdos"> 
										<h4>Título del acuerdo</h4>  
										<s><h5>Fecha límite <span>12/12/1222</span></h5></s>
									</div>
								  	<div class="panel-body text-justify" >
								  		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								 	</div>
								 	<div class="panel-footer p0 pAcuerdos" >
								 		<p>Creado por: <em>Usuario</em></p>
								 	</div>
								</div>
							</div>
							<!-- /// -->
							<div class="col-xs-12">
								<div class="panel panel-default boxAcuerdos">
									<div class="panel-heading p7 pAcuerdos"> 
										<h4>Título del acuerdo</h4>  
										<h5 class="passDate animated flash">Fecha límite <span>12/12/1222</span></h5>
									</div>
								  	<div class="panel-body text-justify" >
								  		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								 	</div>
								 	<div class="panel-footer p0 pAcuerdos" >
								 		<p>Creado por: <em>Usuario</em></p>
								 	</div>
								</div>
							</div>
							<!-- /// -->
							<!-- /// -->
							<div class="col-xs-12">
								<div class="panel panel-default boxAcuerdos">
									<div class="panel-heading p7 pAcuerdos"> 
										<h4>Título del acuerdo</h4>  
										<h5 class="passDate animated flash">Fecha límite <span>12/12/1222</span></h5>
									</div>
								  	<div class="panel-body text-justify" >
								  		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								 	</div>
								 	<div class="panel-footer p0 pAcuerdos" >
								 		<p>Creado por: <em>Usuario</em></p>
								 	</div>
								</div>
							</div>
							<!-- /// -->
							<div class="col-xs-12">
								<div class="panel panel-default boxAcuerdos">
									<div class="panel-heading p2 pAcuerdos"> 
										<h4>Título del acuerdo</h4>  
										<h5>Fecha límite <span>12/12/1222</span></h5>
									</div>
								  	<div class="panel-body text-justify" >
								  		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								 	</div>
								 	<div class="panel-footer p0 pAcuerdos" >
								 		<p>Creado por: <em>Usuario</em></p>
								 	</div>
								</div>
							</div>
							<!-- /// -->
							<!-- /// -->
							<div class="col-xs-12">
								<div class="panel panel-default boxAcuerdos">
									<div class="panel-heading p4 pAcuerdos"> 
										<h4>Título del acuerdo</h4>  
										<h5>Fecha límite <span>12/12/1222</span></h5>
									</div>
								  	<div class="panel-body text-justify" >
								  		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								 	</div>
								 	<div class="panel-footer p0 pAcuerdos" >
								 		<p>Creado por: <em>Usuario</em></p>
								 	</div>
								</div>
							</div>
							<!-- /// -->
							<div class="col-xs-12">
								<div class="panel panel-default boxAcuerdos">
									<div class="panel-heading p4 pAcuerdos"> 
										<h4>Título del acuerdo</h4>  
										<h5>Fecha límite <span>12/12/1222</span></h5>
									</div>
								  	<div class="panel-body text-justify" >
								  		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								 	</div>
								 	<div class="panel-footer p0 pAcuerdos" >
								 		<p>Creado por: <em>Usuario</em></p>
								 	</div>
								</div>
							</div>
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
				        <form class="form-horizontal">
				      		<div class="modal-body">
							  	<div class="form-group">
							    	<label for="title" class="col-sm-2 control-label">Título:</label>
							    	<div class="col-sm-10">
							      		<input type="text" class="form-control" name="title" placeholder="Título..." disabled>
							    	</div>
							  	</div>
							  	<div class="form-group">
							    	<label for="date" class="col-sm-2 control-label">Fecha límite:</label>
							    	<div class="col-sm-10">
							    	  	<input type="date" class="form-control" name="date" placeholder="2012-12-12">
							    	</div>
							  	</div>
							  	<div class="form-group">
							    	<label for="descripcion" class="col-sm-2 control-label">Descripción:</label>
							    	<div class="col-sm-10">
							    	  	<textarea class="form-control" name="descripcion" ></textarea>
							    	</div>
							  	</div>
				      		</div>
				      		<br>
				      		<div class="form-group">
							    	<label for="passwordCurrentUser" class="col-sm-2 text-danger control-label">Contraseña:</label>
							    	<div class="col-sm-10">
							      		<input type="password" class="form-control" name="passwordCurrentUser" placeholder="Digite su contraseña...">
							      		<p class="help-block">Debe ingresar su contraseña para poder modificar acuerdos.</p>
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
				  	<form class="form-horizontal">
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4>¿Desea eliminar el acuerdo ++NombreDelAcuerdo++?</h4>
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
				        	<button type="button" class="btn btn-danger btn-sm">Eliminar</button>
				      	</div>
				    </div>
				    </form>
				  </div>
				</div>
				<!-- fin modal finalizar -->
				<!-- Modal Eliminar -->
				<div class="modal fade" id="modalFinalizarAcuerdo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  	<div class="modal-dialog" role="document">
				  	<form class="form-horizontal">
				    	<div class="modal-content">
				      		<div class="modal-header text-center">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        		<h4>¿Desea finalizar el acuerdo ++NombreDelAcuerdo++?</h4>
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
				        	<button type="button" class="btn btn-success btn-sm">Finalizar</button>
				      	</div>
				    </div>
				    </form>
				  </div>
				</div>
				<!-- fin modal finalizar -->
		</div>
	</div>
@include('admin.partials.footer')