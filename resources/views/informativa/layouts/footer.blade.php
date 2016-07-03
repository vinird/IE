<img id="imgFooter" class="img img-responsive" src="{{ asset('img/img_include/footer.png') }}" style="background: transparent;">
<footer class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<p class="text-justify">Universidad de Costa Rica Sede Arnoldo Ferreto Segura / Carrera de Informática Empresarial</p>
			</div>
			<div class="col-xs-12 col-sm-6">
				<div class="pull-right">
					@if(Auth::check())
						<h5><a href="{{ url('/admin/main') }}"><i class="fa fa-lock" aria-hidden="true"></i> &nbsp;Entrar al perfil administrativo</a></h5>
					@else
						<h5><a href="{{ url('/admin/main') }}"><i class="fa fa-lock" aria-hidden="true"></i> &nbsp;Perfil Administrativo</a></h5>
					@endif
				</div>
			</div>
		</div>
	</div>
</footer>