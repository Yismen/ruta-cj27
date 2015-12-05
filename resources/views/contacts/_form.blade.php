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

<div class="col-sm-12">
	<div class="form-group {{ $errors->has('name') ? 'has-error' : null }}">
		{!! Form::label('name', 'Nombre Completo:', ['class'=>'']) !!}
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-user"></i></div>
			{!! Form::input('text', 'name', null, ['class'=>'form-control', 'placeholder'=>'Nombre Completo']) !!}
		</div>
	</div>
	<!-- /. Nombre Completo -->
	
</div>

<div class="col-sm-6">
	<div class="form-group {{ $errors->has('mobile') ? 'has-error' : null }}">
		{!! Form::label('mobile', 'Tel. Celular:', ['class'=>'']) !!}
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-phone"></i></div>
			{!! Form::input('text', 'mobile', null, ['class'=>'form-control', 'placeholder'=>'Tel. Celular']) !!}
		</div>
	</div>
	<!-- /. Tel. Celular -->
	
</div>

<div class="col-sm-6">
	<div class="form-group {{ $errors->has('secondary') ? 'has-error' : null }}">
		{!! Form::label('secondary', 'Tel. Secundario:', ['class'=>'']) !!}
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-phone"></i></div>
			{!! Form::input('text', 'secondary', null, ['class'=>'form-control', 'placeholder'=>'Tel. Secundario']) !!}
		</div>
	</div>
	<!-- /. Tel. Secundario -->
	
</div>

<div class="col-sm-6">
	<div class="form-group {{ $errors->has('address') ? 'has-error' : null }}">
		{!! Form::label('address', 'Dirección:', ['class'=>'']) !!}
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-location"></i></div>
			{!! Form::input('address', 'address', null, ['class'=>'form-control', 'placeholder'=>'Dirección']) !!}
		</div>
	</div>
	<!-- /. Dirección -->
	
</div>

<div class="col-sm-6">
	<div class="form-group {{ $errors->has('email') ? 'has-error' : null }}">
		{!! Form::label('email', 'Email:', ['class'=>'']) !!}
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-email"></i></div>
			{!! Form::input('email', 'email', null, ['class'=>'form-control', 'placeholder'=>'Email']) !!}
		</div>
	</div>
	<!-- /. Email -->
	
</div>

<div class="col-sm-6">
	<div class="form-group {{ $errors->has('dob') ? 'has-error' : null }}">
		{!! Form::label('dob', 'Fecha de Nacimiento:', ['class'=>'']) !!}
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
			{!! Form::input('date', 'dob', null, ['class'=>'form-control', 'placeholder'=>'Fecha de Nacimiento']) !!}
		</div>
	</div>
	<!-- /. Fecha de Nacimiento -->
	
</div>

<div class="col-sm-6">
	<div class="form-group {{ $errors->has('public') ? 'has-error' : null }}">
		{!! Form::label('public', 'Visibilidad:', ['class'=>'']) !!}
		<div class="input-group">
			<label class="radio-inline">
				<input type="radio" name="public" id="inlineRadio1" value="0" checked="checked" > Privado
			</label>
			<label class="radio-inline">
				<input type="radio" name="public" id="inlineRadio2" value="1"> Público
			</label>
		</div>
	</div>
	<!-- /. Visibilidad -->
	
</div>