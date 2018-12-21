@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="well">
				<div class="row">

					{!! Form::model($driver, ['route'=>['admin.drivers.update', $driver->id], 'method'=>'PUT', 'class'=>'', 'role'=>'form', 'autocomplete'=>"off"]) !!}		
						<div class="form-group text-center">
							<legend>Editar Datos de Chofer {{ $driver->full_name }}</legend>
						</div>				

						@include('drivers._form')
						<div class="form-group">
							<button type="submit" class="btn btn-primary col-sm-8">Editar</button>
						</div>
					{{-- {!! delete_button('admin.drivers.destroy', $driver->id) !!} --}}
						

					{!! Form::close() !!}

					
						
					<div class="form-group">
						<div class="row">
							<div class="form-group">
								{!! delete_button('admin.drivers.destroy', $driver->id, ['class'=>'btn btn-danger ', 'label'=>'Remover Chofer']) !!}
							</div>
						</div>
					</div>
					
					<hr>
					<div class="row">
						<div class="form-group">
							<div class="col-xs-6">
								<img src="http://placehold.it/300x150" class="img-responsive" alt="Image">
							</div>
							<div class="col-xs-6">
								{!! Form::open(['route'=>['admin.drivers.image', $driver->id], 'method'=>'POST', 'class'=>'', 'role'=>'form', 'autocomplete'=>"off"]) !!}		
									<div class="form-group @if($errors->first('main_image')) has-error @endif">
									    {!! Form::label('main_image', 'Foto del Chofer') !!}
									    {!! Form::file('main_image') !!}
									    <p class="help-block">Cargue una foto del chofer. Tambien puede cambiarla aqui.</p>
									    <small class="text-danger">{{ $errors->first('main_image') }}</small>
									</div>

									<button type="submit" class="btn btn-sm btn-info">Guardar Foto</button>								
								{!! Form::close() !!}
							</div>
					</div>
					</div>
				</div>

					<hr>
					<a href="{{ route('admin.drivers.index') }}">Retornar a la lista de Choferes <i class="fa fa-arrow-circle-left"></i></a>
			</div>
		</div>
	</div>
@endsection