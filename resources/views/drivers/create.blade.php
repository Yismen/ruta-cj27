@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="well">
				<div class="row">
					{!! Form::model($driver, ['route'=>['admin.drivers.store'], 'method'=>'POST', 'class'=>'', 'role'=>'form', 'autocomplete'=>"off"]) !!}		
						<div class="form-group text-center">
							<legend>Agregando Nuevo Chofer</legend>
						</div>

						@include('drivers._form')

						<div class="form-group">							
							<button type="submit" class="btn btn-primary col-xs-7 col-xs-offset-1">Crear</button>
							<button type="cancel" class="btn btn-default col-xs-3 col-xs-offset-1">Cancelar</button>
						</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection