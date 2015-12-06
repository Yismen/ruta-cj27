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

						<div class="form-group {{ $errors->has('name') ? 'has-error' : null }}">
							{!! Form::label('name', 'Your Name:', ['class'=>'']) !!}
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
								{!! Form::input('text', 'name', null, ['class'=>'form-control', 'placeholder'=>'Your Name']) !!}
							</div>
						</div>
						<!-- /. Your Name -->
						

						<div class="form-group {{ $errors->has('email') ? 'has-error' : null }}">
							{!! Form::label('email', 'Introduzca su Email:', ['class'=>'']) !!}
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
								{!! Form::input('email', 'email', null, ['class'=>'form-control', 'placeholder'=>'Introduzca su Email']) !!}
							</div>
						</div>
						<!-- /. Introduzca su Email -->

						<div class="form-group {{ $errors->has('password') ? 'has-error' : null }}">
							{!! Form::label('password', 'Introduzca su Clave:', ['class'=>'']) !!}
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-key"></i></div>
								{!! Form::input('password', 'password', null, ['class'=>'form-control', 'placeholder'=>'Introduzca su Clave']) !!}
							</div>
						</div>
						<!-- /. Password -->

						<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : null }}">
							{!! Form::label('password_confirmation', 'Repita la clave:', ['class'=>'']) !!}
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-key"></i></div>
								{!! Form::input('password', 'password_confirmation', null, ['class'=>'form-control', 'placeholder'=>'Repita la clave']) !!}
							</div>
						</div>
						<!-- /. Repita la clave -->
								


						<div class="form-group">
							{!! Form::submit("Registrar", ['class'=>'btn btn-primary']) !!}
						</div>
						
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection