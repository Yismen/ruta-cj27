@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3" >
			<div class="well">
				<div class="row">

					<div class="col-sm-12">
						{!! Form::model($user, ['route'=>['admin.users.update', $user->id], 'method'=>'PUT', 'class'=>'', 'role'=>'form', 'autocomplete'=>"off"]) !!}

							<div class="form-group text-center">
								<legend>Editar Datos de User {{ $user->name }}
									<a href="{{ route('admin.users.index') }}" class="pull-right"><i class="fa fa-list"></i></a>
								</legend>

									
							</div>				

							@include('users._form')
			
							<div class="col-xs-12">	
								<div class="form-group">
									<button type="submit" class="btn btn-primary">Update</button>
								</div>
							</div>
							{{-- {!! delete_button('admin.users.destroy', $user->id) !!} --}}						

						{!! Form::close() !!}					
							
						<div class="col-xs-12">
							<div class="form-group">
								{!! delete_button('admin.users.destroy', $user->id, ['class'=>'btn btn-danger ', 'label'=>'Remove User']) !!}
							</div>
						</div>
					</div>

				</div>

				<hr>
				<a href="{{ route('admin.users.index') }}">Retornar a la lista de Usuarios <i class="fa fa-arrow-circle-left"></i></a>
			</div>
		</div>
	</div>
@endsection