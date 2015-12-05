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

<div class="col-sm-6">
	<div class="form-group {{ $errors->has('file_number') ? 'has-error' : null }}">
		{!! Form::label('file_number', 'Ficha:', ['class'=>'']) !!}
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-folder"></i></div>
			{!! Form::input('text', 'file_number', null, ['class'=>'form-control', 'placeholder'=>'Ficha']) !!}
		</div>
	</div>
	<!-- /. Ficha -->	
</div>

<div class="col-sm-6">
	<div class="form-group {{ $errors->has('card_number') ? 'has-error' : null }}">
		{!! Form::label('card_number', 'Carnet:', ['class'=>'']) !!}
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
			{!! Form::input('text', 'card_number', null, ['class'=>'form-control', 'placeholder'=>'Carnet']) !!}
		</div>
	</div>
	<!-- /. Carnet -->	
</div>

<div class="col-sm-6">
	<div class="form-group {{ $errors->has('full_name') ? 'has-error' : null }}">
		{!! Form::label('full_name', 'Nombre Completo:', ['class'=>'']) !!}
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-user"></i></div>
			{!! Form::input('text', 'full_name', null, ['class'=>'form-control', 'placeholder'=>'Nombre Completo']) !!}
		</div>
	</div>
	<!-- /. Nombre Completo -->
</div>

<div class="col-sm-6">
	<div class="form-group {{ $errors->has('personal_id') ? 'has-error' : null }}">
		{!! Form::label('personal_id', 'Número de Cédula:', ['class'=>'']) !!}
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-credit-card-alt"></i></div>
			{!! Form::input('text', 'personal_id', null, ['class'=>'form-control', 'placeholder'=>'Número de Cédula']) !!}
		</div>
	</div>
	<!-- /. Número de Cédula -->	
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
	<div class="form-group {{ $errors->has('cellphone') ? 'has-error' : null }}">
		{!! Form::label('cellphone', 'Número de Celular:', ['class'=>'']) !!}
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-mobile"></i></div>
			{!! Form::input('text', 'cellphone', null, ['class'=>'form-control', 'placeholder'=>'Número de Celular']) !!}
		</div>
	</div>
	<!-- /. Número de Celular -->	
</div>

<div class="col-sm-6">
	<div class="form-group {{ $errors->has('phone') ? 'has-error' : null }}">
		{!! Form::label('phone', 'Teléfono de la Casa:', ['class'=>'']) !!}
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-phone"></i></div>
			{!! Form::input('text', 'phone', null, ['class'=>'form-control', 'placeholder'=>'Teléfono de la Casa']) !!}
		</div>
	</div>
	<!-- /. Teléfono de la Casa -->			
</div>

<div class="col-sm-6">
	<div class="form-group {{ $errors->has('city') ? 'has-error' : null }}">
		{!! Form::label('city', 'Ciudad donde Reside:', ['class'=>'']) !!}
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-map"></i></div>
			{!! Form::input('text', 'city', null, ['class'=>'form-control', 'placeholder'=>'Ciudad donde Reside']) !!}
		</div>
	</div>
	<!-- /. Ciudad donde Reside -->
</div>

<div class="col-sm-12">
	<div class="form-group {{ $errors->has('address') ? 'has-error' : null }}">
		{!! Form::label('address', 'Dirección Completa:', ['class'=>'']) !!}
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
			{!! Form::input('text', 'address', null, ['class'=>'form-control', 'placeholder'=>'Dirección Completa']) !!}
		</div>
	</div>
	<!-- /. Dirección Completa -->
</div>

<hr>

<div class="col-sm-6">
	<div class="form-group {{ $errors->has('car_id') ? 'has-error' : null }}">
		{!! Form::label('car_id', 'Número de Carro:', ['class'=>'']) !!}
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-car"></i></div>
			{!! Form::input('text', 'car_id', null, ['class'=>'form-control', 'placeholder'=>'Número de Carro']) !!}
		</div>
	</div>
	<!-- /. Número de Carro -->
</div>

<div class="col-sm-6">
	<div class="form-group {{ $errors->has('plate_number') ? 'has-error' : null }}">
		{!! Form::label('plate_number', 'Número de Placa:', ['class'=>'']) !!}
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-hashtag"></i></div>
			{!! Form::input('text', 'plate_number', null, ['class'=>'form-control', 'placeholder'=>'Número de Placa']) !!}
		</div>
	</div>
	<!-- /. Número de Placa -->
</div>

<hr>

<div class="col-sm-6">
	<div class="form-group {{ $errors->has('reference') ? 'has-error' : null }}">
		{!! Form::label('reference', 'Persona de Referencia:', ['class'=>'']) !!}
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-user"></i></div>
			{!! Form::input('text', 'reference', null, ['class'=>'form-control', 'placeholder'=>'Persona de Referencia']) !!}
		</div>
	</div>
	<!-- /. Persona de Referencia -->
</div>

<div class="col-sm-6">
	<div class="form-group {{ $errors->has('reference_phone') ? 'has-error' : null }}">
		{!! Form::label('reference_phone', 'Teléfono de Referencia:', ['class'=>'']) !!}
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-phone"></i></div>
			{!! Form::input('text', 'reference_phone', null, ['class'=>'form-control', 'placeholder'=>'Teléfono de Referencia']) !!}
		</div>
	</div>
	<!-- /. Teléfono de Referencia -->
</div>