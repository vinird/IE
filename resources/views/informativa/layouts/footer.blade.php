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
						<p class="text-right"><a href="{{ url('/admin/main') }}"><i class="fa fa-lock" aria-hidden="true"></i> &nbsp;Perfil Administrativo</a></p>
					@endif
				</div>
			</div>
		</div>
	</div>
</footer>