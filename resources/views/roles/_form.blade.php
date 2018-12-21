@include('layouts.common.errors-div')

<div class="form-group {{ $errors->has('role') ? 'has-error' : null }}">
	{!! Form::label('role', 'Role:', ['class'=>'']) !!}
	<div class="input-group">
		<div class="input-group-addon"><i class="fa fa-cog"></i></div>
		{!! Form::input('text', 'role', null, ['class'=>'form-control', 'placeholder'=>'Role']) !!}
	</div>
</div>
<!-- /. Role -->

<div class="form-group {{ $errors->has('description') ? 'has-error' : null }}">
	{!! Form::label('description', 'Role Description:', ['class'=>'']) !!}
	<div class="input-group">
		<div class="input-group-addon"><i class="fa fa-info-circle"></i></div>
		{{-- {!! Form::input('text', 'description', null, ['class'=>'form-control', 'placeholder'=>'Role Description']) !!} --}}
		{!! Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Role Description']) !!}
	</div>
</div>
<!-- /. Role Description -->