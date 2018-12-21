@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="well">
				<div class="row">

					{!! Form::model($contact, ['route'=>['admin.contacts.update', $contact->id], 'method'=>'PUT', 'class'=>'', 'role'=>'form', 'autocomplete'=>"off"]) !!}		
						<div class="form-group text-center">
							<legend>Editar Datos de Contacto {{ $contact->name }}
								<a href="{{ route('admin.contacts.index') }}" class="pull-right"><i class="fa fa-list"></i></a>
							</legend>

								
						</div>				

						@include('contacts._form')
		
						<div class="col-xs-12">	
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Editar</button>
							</div>
						</div>
						{{-- {!! delete_button('admin.contacts.destroy', $contact->id) !!} --}}
						

					{!! Form::close() !!}

					
						
						<div class="col-xs-12">
							<div class="form-group">
								{!! delete_button('admin.contacts.destroy', $contact->id, ['class'=>'btn btn-danger ', 'label'=>'Remover Contacto']) !!}
							</div>
						</div>
					
					<hr>
					<div class="form-group">
						<div class="col-xs-6">
							<img src="{{ asset($contact->photo) }}" class="img-responsive" alt="Image">
						</div>
						<div class="col-xs-6">
							{!! Form::open(['route'=>['admin.contacts.image', $contact->id], 'method'=>'POST', 'class'=>'', 'role'=>'form', 'autocomplete'=>"off", 'files' => true]) !!}		
								<div class="form-group @if($errors->first('photo')) has-error @endif">
								    {!! Form::label('photo', 'Foto del Contacto') !!}
								    {!! Form::file('photo') !!}
								    <p class="help-block">Cargue una foto del Contacto. Tambien puede cambiarla aqui.</p>
								    <small class="text-danger">{{ $errors->first('photo') }}</small>
								</div>

								<button type="submit" class="btn btn-sm btn-info">Guardar Foto</button>								
							{!! Form::close() !!}
						</div>
					</div>
				</div>

					<hr>
					<a href="{{ route('admin.contacts.index') }}">Retornar a la lista de Contactoes <i class="fa fa-arrow-circle-left"></i></a>
			</div>
		</div>
	</div>
@endsection