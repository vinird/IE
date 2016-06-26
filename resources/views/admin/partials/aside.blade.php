<div class="col-sm-3 col-md-2 col-xl-1 b-black side-nav side-nav-lg hidden-xs" id="side-nav-1">
		<ul>
			@if(Auth::user()->userType == 1)
			<li> 
				<a href="{{url('/admin/users')}}"> <i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp; Usuarios &nbsp;&nbsp;
					@if(isset($logUser) && Auth::user()->userType == 1)
						@if($logUser->count > 0)
						<span style="background: red;" class="badge">{{ $logUser->count }} </span>
						@endif
					@endif
				</a> 
			</li>
			@endif
			<li id="repositorio-dropdown-btn"> 
				<a href="{{ url('/admin/repositorio') }}">
					<i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp; Repositorio 
						@if(count($categorias) > 0)
							<i id="dropdown-chevron" class="fa fa-chevron-down pull-right" aria-hidden="true">
						@endif
					</i>  
				</a> 
			</li>
				<ul id="repositorio-dropdown-ul" class="hide" isActive="false">
				@if(count($categorias) > 0)
					@foreach ($categorias as $c)
						<li> <a href="{{ route('repositorio.indexCategory', $c->id ) }}">{{ $c->name }}</a></li>
					@endforeach
				@endif
				</ul>
			<li> 
				<a href="{{ url('/admin/noticias') }}"> <i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp;&nbsp; Noticias </a> 
			</li>
			<li> 
				<a href="{{ url('/admin/eventos') }}"> <i class="fa fa-calendar-o" aria-hidden="true"></i>&nbsp;&nbsp; Eventos </a> 
			</li>
			<li> 
				<a href="{{ url('/admin/acuerdos') }}"> <i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;&nbsp; Acuerdos </a> 
			</li>
			@if(Auth::user()->userType == 1)
			<li> 
				<a href="{{ url('/admin/sede') }}"> <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp; Sedes </a> 
			</li>
			@endif
		</ul>
	</div>

	<div class="col-sm-3 col-lg-2 b-black side-nav side-nav-xs hidden-lg hidden-md hidden-sm side-nav-2 hide" id="side-nav-2">
		<ul>
			@if(Auth::user()->userType == 1)
			<li> 
				<a href="{{url('/admin/users')}}"> <i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp; Usuarios &nbsp;&nbsp;
				@if(isset($logUser) && Auth::user()->userType == 1)
					@if($logUser->count > 0)
					<span style="background: red;" class="badge">{{ $logUser->count }} </span>
					@endif
				@endif
				</a> 
			</li>
			@endif
			@if(count($categorias) > 0)
			<li id="dropdown-chevron2"> 
				<a> 
					<i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp; Repositorio <i id="" class="fa fa-chevron-down pull-right" aria-hidden="true"></i>  
				</a> 
			</li>
				<ul id="repositorio-dropdown-ul2" class="hide" isActive="false">
					@foreach ($categorias as $c)
						<li> <a href="{{ route('repositorio.indexCategory', $c->id ) }}">{{ $c->name }}</a></li>
					@endforeach
				</ul>
			@else
			<li id="dropdown-chevron2"> 
				<a href="{{ url('/admin/repositorio') }}"> 
					<i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;&nbsp; Repositorio </i>  
				</a> 
			</li>
			<li> 
				<a href="{{ url('/admin/noticias') }}"> <i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp;&nbsp; Noticias </a> 
			</li>
			@endif
			<li> 
				<a href="{{ url('/admin/noticias') }}"> <i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp;&nbsp; Noticias </a> 
			</li>
			<li> 
				<a href="{{ url('/admin/eventos') }}"> <i class="fa fa-calendar-o" aria-hidden="true"></i>&nbsp;&nbsp; Eventos </a> 
			</li>
			<li> 
				<a href="{{ url('/admin/acuerdos') }}"> <i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;&nbsp; Acuerdos </a> 
			</li>
			@if(Auth::user()->userType == 1)
			<li> 
				<a href="{{ url('/admin/sede') }}"> <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp; Sedes </a> 
			</li>
			@endif
		</ul>
	</div>
	