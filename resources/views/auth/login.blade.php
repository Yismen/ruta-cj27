@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="col-sm-6 col-sm-offset-3">
				<div class="row">
			<div class="well">
					{!! Form::open() !!}

						<div class="form-group text-center">
							<legend>Por Favor Inicie Sesión <i class="fa fa-unlock"></i></legend>
						</div>

						{{-- Display Errors --}}
						@if( $errors->any() )
							<div class="col-sm-12">
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							</div>
						@endif
						{{-- /. Errors --}}

						<div class="form-group {{ $errors->has('email') ? 'has-error' : null }}">
							{!! Form::label('email', 'Introduzca su Email:', ['class'=>'']) !!}
							<div class="input-group">
								{!! Form::input('email', 'email', null, ['class'=>'form-control', 'placeholder'=>'Introduzca su Email']) !!}
								<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
							</div>
						</div>
						<!-- /. Introduzca su Email -->

						<div class="form-group {{ $errors->has('password') ? 'has-error' : null }}">
							{!! Form::label('password', 'Introduzca su Clave:', ['class'=>'']) !!}
							<div class="input-group">
								{!! Form::input('password', 'password', null, ['class'=>'form-control', 'placeholder'=>'Introduzca su Clave']) !!}
								<div class="input-group-addon"><i class="fa fa-key"></i></div>
							</div>
						</div>
						<!-- /. Introduzca su Clave -->

						<div class="checkbox">
							<label>
								<input type="checkbox" name="remember">
								Recordar Sesión
							</label>
						</div>
						<!-- /. Text -->


						<div class="form-group">
							{!! Form::submit("Entrar", ['class'=>'btn btn-primary']) !!}
						</div>
						
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection