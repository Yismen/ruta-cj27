@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
			<div class="row">
				<div class="well">
					<h1 class="page-header">Listado de Choferes 
						<a href="{{ route('admin.drivers.create') }}"><i class="fa fa-plus"></i></a>
						<a href="{{ route('admin.drivers.birthdays') }}" class="pull-right"><i class="fa fa-birthday-cake"></i></a>
					</h1>
					{!! Form::open(['route'=>['admin.drivers.search'], 'method'=>'GET', 'class'=>'', 'role'=>'form', 'autocomplete'=>"off"]) !!}		
						<div class="form-group {{ $errors->has('search') ? 'has-error' : null }}">
							{!! Form::label('search', 'Buscar:', ['class'=>'']) !!}
							<div class="input-group">
								<div class="input-group-btn">
									<a href="{{ route('admin.drivers.index') }}" class="btn btn-default">Todos</a>
								</div>
								{!! Form::input('search', 'search', null, ['class'=>'form-control', 'placeholder'=>'Buscar']) !!}
								<div class="input-group-btn">
									<button type="submit" class="btn btn-default">
										<i class="fa fa-search"></i>
									</button>
								</div>
							</div>							
						    <p class="help-block">Puede buscar por cualquier valor</p>
						</div>
					
					{!! Form::close() !!}
					<!-- /. Buscar -->

					@if ($drivers->count() > 0)
						<div class="table-responsivse">
							<table class="table table-hover table-condensed">
								<thead>
									<tr>
										<th>Nombre:</th>
										<th>Cédula:</th>
										<th>Celular:</th>
										<th>Foto:</th>	
										<th>Edit:</th>	
									</tr>
								</thead>
								<tbody>
									@foreach ($drivers as $driver)
										<tr>
											<td>
												<a href="{{ route('admin.drivers.show', $driver->id) }}">{{ $driver->full_name }}</a>
											</td>
											<td>{{ $driver->personal_id }}</td>
											<td>{{ $driver->cellphone }}</td>
											<td>
												<img src="{{ asset($driver->main_image) }}" class="img-responsive" alt="Image" width="50" height="50">
											</td>
											<td>
												<a href="{{ route('admin.drivers.edit', $driver->id) }}"><i class="fa fa-pencil"></i></a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					@else
						<h3>No hay choferes registrados con el criterio de búsquda especificado..</h3>
					@endif

					{!! $drivers->render() !!}
				</div>
			</div>
		</div>
	</div>

	
@endsection