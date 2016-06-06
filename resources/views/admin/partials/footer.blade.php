</div>
<!-- Modal cambiar contrasena -->
		<div class="modal fade" id="modalCambiarContrasena" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		  			{!! Form::open( ['route' => ['users.update.password', Auth::user()->id] , 'class' => 'form-horizontal']) !!}
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      		</div>
		      		<div class="modal-body">
		      			<br>
		      			<div class="form-group">
					   		<label for="password" class="col-sm-4 control-label">Contraseña:</label>
					   		<div class="col-sm-8">
					   			<input class="form-control" type="password" name="password">
					   		</div>
						</div>
						<br>
						<div class="form-group">
					   		<label for="newPassword" class="col-sm-4 text-danger control-label">Nueva contraseña:</label>
					   		<div class="col-sm-8">
					   			<input class="form-control" type="password" name="newPassword">
					   		</div>
						</div>
		      			<div class="form-group">
					   		<label for="confirmPassword" class="col-sm-4 text-danger control-label">Confirme ontraseña:</label>
					   		<div class="col-sm-8">
					   			<input class="form-control" type="password" name="confirmPassword">
					   		</div>
						</div>
						<div class="form-group hidden">
					   		<label for="url" class="col-sm-4 text-danger control-label"></label>
					   		<div class="col-sm-8">
					   			<input class="form-control" type="text" name="url" value="{{ url()->current() }}">
					   		</div>
						</div>
		      		</div> 
		      		<br><br>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
		        		<button type="submit" class="btn btn-success btn-sm">Enviar</button>
		      		</div>
		    		{!! Form::close() !!}
		    	</div>
		  </div>
		</div>
		<!-- fin modal -->

<!-- alertas -->
<footer class="animated fadeInDown">
		@include('flash::message')
</footer>
</body>
</html>