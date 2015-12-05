@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
			<div class="well">
				<div class="row">
					<h3 class="page-header text-center">Detalles del Chofer [{{ $driver->full_name }}]</h3>
					
					<div class="col-sm-8 col-sm-offset-2">
						<img src="http://placehold.it/500x300" class="img-responsive" alt="Image">
					</div>
					
					<table class="table table-condensed table-hover">
						<thead>	
								{{-- Nombre --}}
								<tr>
									<th># de Cédula:</th><td>{{ $driver->personal_id }}</td>
									<th>Fecha de Nacimiento:</th><td>{{ $driver->dob }}</td>
								</tr>
								<tr>
									<th># de Ficha o Archivo:</th><td>{{ $driver->file_number }}</td>
									<th>Número de Carnet:</th><td>{{ $driver->card_number }}</td>
								</tr>
								<tr>
									<th>Teléfono Celular:</th><td>{{ $driver->cellphone }}</td>
									<th>Teléfono Casa:</th><td>{{ $driver->phone }}</td>
								</tr>
								<tr>
									<th>Dirección:</th><td colspan="3">{{ $driver->address }}, {{ $driver->city }}</td>
								</tr>
								<tr>
									<th># de Carro:</th><td>{{ $driver->car_id }}</td>
									<th># de Placa:</th><td>{{ $driver->plate_number }}</td>
								</tr>
								<tr>
									<th>Referencia:</th><td>{{ $driver->reference }}</td>
									<th># de Referencia:</th><td>{{ $driver->reference_phone }}</td>
								</tr>

						</thead>
					</table>

					<hr>

					<a href="{{ URL::previous() }}" class="pull-left"><i class="fa fa-arrow-circle-left"></i> Regresar </a>
					<a href="{{ route('admin.drivers.edit', $driver->id) }}" class="pull-right text-warning"> Editar <i class="fa fa-pencil"></i></a>
				</div>
			</div>
		</div>
	</div>
@endsection