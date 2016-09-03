</div>
<!-- Modal cambiar contrasena -->
		<div class="modal fade" id="modalCambiarContrasena" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		  			{!! Form::open( ['route' => ['users.update.password', Auth::user()->id] , 'class' => 'form-horizontal']) !!}
		      		<div class="modal-header text-center">
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        		<h4 class="modal-title" id="myModalLabel">{{Auth::user()->email}}</h4>
		      		</div>
		      		<div class="modal-body">
		      			<br>
		      			<div class="form-group">
					   		<label for="password" class="col-sm-4 control-label">Contraseña:</label>
					   		<div class="col-sm-8">
					   			<input class="form-control" type="password" name="password" required>
					   		</div>
						</div>
						<br>
						<div class="form-group">
					   		<label for="newPassword" class="col-sm-4 text-danger control-label">Nueva contraseña:</label>
					   		<div class="col-sm-8">
					   			<input class="form-control" type="password" name="newPassword" required>
					   		</div>
						</div>
		      			<div class="form-group">
					   		<label for="confirmPassword" class="col-sm-4 text-danger control-label">Confirme contraseña:</label>
					   		<div class="col-sm-8">
					   			<input class="form-control" type="password" name="confirmPassword" required>
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

<!-- modal modificar token-->

<div id="modalToken" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">

    	<div class="modal-header text-center">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Modificar Token</h4>
      	</div>
		<form action="{{route('tokens.modify')}}" method="post" class="form-horizontal">
	      <div class="modal-body">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			  	<div class="form-group">
			    	<label for="token" class="col-sm-4 control-label">Token actual:</label>
			    	<div class="col-sm-8">
			    		<input type="password" class="form-control" name="token" id="token" placeholder="********" required>
			  		</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="token2" class="col-sm-4 control-label">Nuevo token:</label>
			    	<div class="col-sm-8">
			    		<input type="password" class="form-control" name="token2" id="token" required>
			  		</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="token3" class="col-sm-4 control-label">Confirme el nuevo token:</label>
			    	<div class="col-sm-8">
			    		<input type="password" class="form-control" name="token3" id="token" required>
			  		</div>
			  	</div>
	      </div>
	      <div class="modal-footer">
			  	<a class="btn btn-default btn-sm" href="{{route('tokens.reset')}}" onclick="confirm('Esto reiniciará el token al valor por defecto [informatica2016] ¿Desea proceder?')">Reiniciar token</a>
			  	<button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;&nbsp;Actualizar</button>
	      </div>
		</form>
    </div>
  </div>
</div>

<!-- alertas -->
<footer class="animated bounceInLeft">
		@include('flash::message')
</footer>
</body>
</html>