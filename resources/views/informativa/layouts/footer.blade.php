<img id="imgFooter" class="img img-responsive" src="{{ asset('img/img_include/footer.png') }}" style="background: transparent;">
<footer class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<p class="">Universidad de Costa Rica Sede Arnoldo Ferreto Segura / Carrera de Informática Empresarial</p>
			</div>
			<div class="col-xs-12 col-sm-6">
				<div class="">
					@if(Auth::check())
						<p class="text-right"><a href="{{ url('/admin/main') }}"><i class="fa fa-lock" aria-hidden="true"></i> &nbsp;Entrar al perfil administrativo</a></p>
					@else
						<p class="text-right"><a data-toggle="modal" data-target="#modalToken" href="{{ url('/admin/main') }}"><i class="fa fa-lock" aria-hidden="true"></i> &nbsp;Perfil Administrativo</a></p>
					@endif
				</div>
			</div>
		</div>
	</div>
</footer>


<div class="site-wrap">
	<a id="botonAutoresCerrar" class="pull-right"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a>
    <!-- insert the rest of your page markup here -->
    <br>
    <h5>Sistema informático desarrollado para la carrera de Informática Empresarial</h5>
    <p>Este sistema se desarrolló en la Universidad de Costa Rica sede Arnoldo Ferreto Segura (Pacífico) por estudiantes de la carrera de Informática y Tecnología Multimedia para el curso de Desarrollo de Aplicaciones Interactivas ll (TM5100).</p><br>
    <p>Autores:</p>
    <p>Michael Vinicio Rodríguez Delgado / <a href="mailto:mv-design@hotmail.com">mv-design@hotmail.com</a></p>
    <p>Francisco Meléndez Gutiérrez / <a href="mailto:franciscomelendezg@gmail.com">franciscomelendezg@gmail.com</a></p><br>
    <p>Profesor encargado:</p>
    <p>Gerardo López Falcón</p><br><br>
    <div class="hidden-xs">
		<p>El sistema implementa las siguientes tecnologías:</p>
		<ul>
			<li>PHP</li>
			<li>MySQL</li>
			<li>Composer</li>
			<li>Laravel</li>
			<li>Laravelcollective html</li>
			<li>Laracast flash</li>
			<li>Intervention image</li>
			<li>Angular</li>
			<li>jQuery</li>
			<li>Bootstrap</li>
			<li>BootstrapXL</li>
			<li>Bootstrap-notify</li>
			<li>UIKit</li>
			<li>Animate</li>
			<li>FontAwesome</li>
			<li>FullCalendar</li>
			<li>trumbowyg</li>
		</ul>
    </div>
</div>
<div class="site-wrap-shadow"></div>

<!-- Small modal -->

<div id="modalToken" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">

    	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Ingreso al sistema</h4>
      	</div>
	      <div class="modal-body">
			<form action="{{route('tokens.getValue')}}" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			  	<div class="form-group">
			    	<label for="token">Token:</label>
			    	<input type="password" class="form-control" name="token" id="token" placeholder="********" required>
			    	<p class="help-block">El token es una clave de seguridad para el ingreso al sistema.</p>
			  	</div>
			  	<button type="submit" class="btn btn-primary "><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;&nbsp;Ingresar</button>
			</form>
	      </div>
    </div>
  </div>
</div>