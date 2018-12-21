@include('layouts.common.errors-div')

<div class="form-group {{ $errors->has('name') ? 'has-error' : null }}">
	{!! Form::label('name', 'User Full Name:', ['class'=>'']) !!}
	<div class="input-group">
		<div class="input-group-addon"><i class="fa fa-user"></i></div>
		{!! Form::input('text', 'name', null, ['class'=>'form-control', 'placeholder'=>'User Full Name']) !!}
	</div>
</div>
<!-- /. User Full Name -->

<div class="form-group {{ $errors->has('role') ? 'has-error' : null }}">
	{!! Form::label('role_id', 'User Role:', ['class'=>'']) !!}
	<div class="input-group">
		<div class="input-group-addon"><i class="fa fa-key"></i></div>
		{!! Form::select('role_id', $user->rolesList, null, ['class'=>'form-control input-sm']) !!}
	</div>
</div>
<!-- /. User Role -->
