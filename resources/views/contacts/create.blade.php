@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="well">
				<div class="row">
					{!! Form::model($contact, ['route'=>['admin.contacts.store'], 'method'=>'POST', 'class'=>'', 'role'=>'form', 'autocomplete'=>"off"]) !!}		
						<div class="form-group text-center">
							<legend>Agregando Nuevo Contacto 
								<a href="{{ route('admin.contacts.index') }}" class="pull-right"><i class="fa fa-list"></i></a>
							</legend>
						</div>

						@include('contacts._form')

						<div class="form-group">							
							<button type="submit" class="btn btn-primary col-xs-6 col-xs-offset-1">Crear</button>
							<button type="reset" class="btn btn-default col-xs-3 col-xs-offset-1">Cancelar</button>
						</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection