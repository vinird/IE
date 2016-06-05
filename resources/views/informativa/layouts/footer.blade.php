<footer class="container-fluid">
	<div class="container">
		<div class="row">
			<br>
			<div class="col-xs-12">
				<div class="pull-right">
					@if(Auth::check())
						<h5><a href="{{ url('/admin/main') }}">Entrar al perfil administrativo</a></h5>
					@else
						<h5><a href="{{ url('/admin/main') }}">Perfil Administrativo</a></h5>
					@endif
				</div>
			</div>
			<div class="col-xs-12">
				<br>
				<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
			</div>
			<br>
		</div>
	</div>
</footer>