<div class="form-group {{ $errors->has('name') ? 'has-error' : null }}">
	{!! Form::label('name', 'Tarea:', ['class'=>'']) !!}
	{!! Form::input('text', 'name', null, ['class'=>'form-control', 'placeholder'=>'Tarea']) !!}
</div>
<!-- /. Tarea -->
<div class="form-group {{ $errors->has('due') ? 'has-error' : null }}">
	{!! Form::label('due', 'Fecha Límite:', ['class'=>'']) !!}
	{!! Form::input('date', 'due', null, ['class'=>'form-control', 'placeholder'=>'Fecha Límite']) !!}
</div>
<!-- /. Fecha Límite -->

<div class="form-group {{ $errors->has('description') ? 'has-error' : null }}">
	{!! Form::label('description', 'Descripción:', ['class'=>'']) !!}
	{!! Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Descripción']) !!}
</div>
<!-- /. Descripción -->