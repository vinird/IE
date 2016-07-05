<!DOCTYPE html>
<html ng-app="App" lang="es">
<head>
	
	<title>Contacto</title>
	@include('informativa.layouts.headContent')

</head>
<body class="">
<!--/////////// navbar ////////////////-->

@include('informativa.layouts.navBar')

<!--//////// Body ///////////-->


<!-- -->
<div style="background-color: #83A1B4">
	<div class="container" style="-webkit-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08);
-moz-box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08);
box-shadow: 0px 0px 32px -2px rgba(0,0,0,0.08); background-color: #FFF">

		<div class="row">
			<div class="col-xs-12">
				<h3>Directorio</h3>
				<div class="divider-sm-color pull-left"></div>
			</div>
		</div>
		<br>
		<br>

		<div class="col-sm-12 col-md-10 col-md-offset-1">
			<div class="table-responsive">
			 	<table class="table">
			    	<thead>
			    		<td class="hidden-xs"><h3></h3></td>
			    		<th>Coordinador / a</th>
			    		<th>Teléfono</th>
			    		<th>Correo Electrónico</th>
			    	</thead>
			    	<tbody>
			    	@if(isset($sedes) && isset($users))
			    		@if(count($sedes) > 0 && count($users) > 0)
			    			@foreach($sedes as $s)
					    		<tr>
					    			<td class="hidden-xs"><h3>{{ $s->name }}</h3></td>
					    			<td></td>
					    			<td></td>
						    		<td></td>
					    		</tr>
					    		<tr class="hidden-sm hidden-md hidden-lg">
					    			<td><h3>{{ $s->name }}</h3></td>
					    			<td></td>
					    			<td></td>
					    		</tr>
					    		<tr>
					    			@foreach($users as $u)
							    		@if($u->sede_id == $s->id)
							    			<td class="hidden-xs"></td>
								    		<td>
								    				{{ $u->name }}
								    		</td>
								    		<td>{{ $u->phone }} <a href="tel:00000000">&nbsp; <i class="fa fa-phone-square hidden-sm hidden-md hidden-lg" aria-hidden="true"></i> </a></td>
								    		<td>{{ $u->email }}  <a href="mailto:someone@example.com?Subject=Hello%20again" target="_top">&nbsp; <i class="fa fa-envelope" aria-hidden="true"></i></a> </td>
							    		@endif
							    	@endforeach
					    		</tr>
				    		@endforeach
				    	@endif
			    	@endif
			    	
			    	</tbody>
			  	</table>
			</div>
			  	<br><br><br>
			  	<br><br><br>
			  	<br>
		</div>
	</div>
</div>

<!--//////////// footer //////////-->

@include('informativa.layouts.footer')


</body>
<script src="js/js_resources/animate_icon/main_animate_icon.js"></script>
</html>