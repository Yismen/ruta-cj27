<div class="well">
	{!! Form::model($singleTodo, ['route'=>['admin.todos.store'], 'class'=>'', 'role'=>'form', 'autocomplete'=>"off", "novalidate"=>"novalidate"]) !!}		 
		<div class="form-group">
			<legend>Agregar Tarea</legend>
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
	
		@include('todos._form')

		<div class="form-group">
			<button class="form-control btn btn-primary" type="submit">Agregar Tarea <i class="fa fa-plus"></i></button>
		</div>
	
	{!! Form::close() !!}
</div>