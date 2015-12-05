
@if ($drivers->birthdaysNextMonth->count() > 0)
	<h1 class="text-center text-info">
		Las Siguientes Personas Cumplen Años En El Mes de {{ date("M", strtotime("+1 months")) }}
	</h1>
	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th>Nombre:</th>
				<th>Día:</th>
				<th>Edad:</th>
				<th>Celular:</th>
				<th>Casa:</th>
				<th>Foto:</th>
				<th>Detalles:</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($drivers->birthdaysNextMonth as $driver)
				<tr>
					<td><a href="{{ route('admin.drivers.show', $driver->id) }}">{{ $driver->full_name }}</a></td>
					<td>{{ date("d", strtotime($driver->dob)) }}</td>
					<td>{{ Carbon\Carbon::parse($driver->dob)->age }} Años</td>
					<td>{{ $driver->cellphone }}</td>
					<td>{{ $driver->phone }}</td>
					<td><img src="{{ asset($driver->main_image) }}" class="img-responsive" alt="Image"></td>
					<td><a href="{{ route('admin.drivers.show', $driver->id) }}"><i class="fa fa-eye"></i></a></td>					
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	<h1 class="text-center text-warning">
		Noy hay choferes que cumplan años en el mes de {{ date("M", strtotime("+1 months")) }}!
	</h1>
@endif		        	