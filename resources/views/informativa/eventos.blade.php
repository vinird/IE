<!DOCTYPE html>
<html ng-app="App" lang="es">
	<head>

		@include('informativa.layouts.headContentEventos')

	</head>
	<body>
		<!--/////////// navbar ////////////////-->

		@include('informativa.layouts.navBar')

		<!--//////// Body ///////////-->

		<div style="background-color: #83A1B4">
			<div class="container" style="-webkit-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); -moz-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); background-color: #FFF">
				<div class="row">
					<a id="icon-data-toggle-events" class="col-xs-12 col-sm-2 nav-dark-background text-center">Buscar&nbsp;<i class="fa fa-search  color-white" aria-hidden="true"></i></a>
					<br><br>
					<div id="events-nav-section" events-nav-active="false" class="col-xs-12 nav-modify text-center hide">
						@if(isset($sedes))
							@foreach($sedes as $sede)
								<div class="col-xs-12 col-sm-2 col-nav-modify">
									<a href="/eventos/{{ $sede->id }}" class="events-link-toggle"><strong>{{$sede->name}}</strong></a>
								</div>
							@endforeach
						@endif
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-12">
						<div class="col-xs-12 col-sm-5 pull-right">
							<div id='calendar' style="padding: 1em;"></div>
						</div>
						<div id="tableNextEvents" class="col-xs-12 col-sm-7">
							<div class="titleTableNextEvents">
								<h3>Próximos eventos</h3>
								<div class="divider-md pull-left"></div>
							</div>
							<table class="table table-hover">
								<thead>
									<th>Título</th>
									<th>Fecha del evento</th>
									<th>Sede del evento</th>
									<th>Organizado por</th>
								</thead>
								<tbody>
									@if(isset($eventosNext) && count($eventosNext) > 0)
										@foreach($eventosNext as $evento)
											<tr>
												<td>{{ $evento->title }}</td>
												<td>{{ explode(" ", $evento->event_date)[0] }}</td>
												<td><span class="badge">@if(isset($sedes))
													@foreach($sedes as $sede)
														@if($sede->id == $evento->sede_id)
															{{ $sede->name }}
														@endif
													@endforeach
												@endif</span></td>
												<td>{{ $evento->org }}</td>
											</tr>
										@endforeach
									@else
										<tr>
											<td colspan="4">No se encontraron próximos eventos</td>
										</tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div id="allEvents" class="row">
					<div class="col-xs-12">
						<div class="col-xs-12">
							<h3>Todos los eventos</h3>
							<div class="divider-md pull-left"></div>
						</div>
						<div class="bloque2"></div>
						@if(isset($eventos) && count($eventos) > 0)
							@foreach($eventos as $evento)
								<div class="col-xs-12 col-sm-6">
									<div class="panel panel-default">
										<div class="panel-body">
											<h3>{{ $evento->title }}</h3>
											<div class="divider-sm-color pull-left"></div>
											</h2>
											<br>
											@if(isset($evento->url_img))
												<img class="img-responsive" src="{{ asset('img/eventos/'.$evento->url_img) }}">
											@endif
											<br>
											<i>Fecha: {{ explode(" ", $evento->event_date)[0] }}<br>
											Sede:
												@if(isset($sedes))
													@foreach($sedes as $sede)
														@if($sede->id == $evento->sede_id)
															{{ $sede->name }}
														@endif
													@endforeach
												@endif</i>
											<br>
											<p class="text-justify">
												{!! $evento->content !!}
											</p>
											@if(isset($evento->url_document))
												<br>
												<p>
													<a class="download_file" href="/file/getEvento/{{ $evento->url_document }}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i><span>&nbsp;{{ $evento->url_document }}</span></a>
												</p>
											@endif
										</div>
									</div>
								</div>
							@endforeach
						@else
							<div class="panel-body">
								<h1 class="text-center">No hay eventos</h1>
							</div>
							<div class="bloque"></div>
						@endif
					</div>
					<div class="col-xs-12 text-center">
						<nav>
							{!! $eventos->render() !!}
						</nav>
					</div>
				</div>
				<div id="eventDetails" class="row" style="display:none;">
					<div class="col-xs-12">
					  <div class="col-xs-12">
							<div id="event_Exit">
								<p>
									<i class="fa fa-chevron-left" aria-hidden="true"></i><span>&nbsp;&nbsp;Volver</span>
								</p>
							</div>
					    <div class="panel panel-default">
					      <div class="panel-body">
					        <h3 id="eventTitle"></h3>
					        <div class="divider-sm-color pull-left"></div>
					        </h2>
					        <br>
									<i id="eventInfo"></i><br>
									<br>
									<img id="eventImg">
									<div id="blockDivider" class="bloque hidden-md hidden-lg"></div>
					        <p id="eventContent" class="text-justify"></p>
									<br>
									<p id="eventDocument">
										<a class="download_file hide" href="" target="_blank"><i class="fa fa-download" aria-hidden="true"></i><span>&nbsp;</span></a>
									</p>
					      </div>
					    </div>
					  </div>
					</div>
				</div>
				<br><br>
				<br><br>
			</div>
		</div>

		<!--//////////// footer //////////-->

		@include('informativa.layouts.footer')
		<script type="text/javascript">
			loadEvents(<?php echo json_encode($eventosAll); ?>, <?php echo json_encode($sedes); ?>);
		</script>
		<script src="{{ asset('js/js_resources/animate_icon/main_animate_icon.js') }}"></script>
	</body>
</html>
