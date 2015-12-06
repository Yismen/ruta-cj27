
@extends('layouts.admin')

@section('content')
	<div class="container">

			{{-- {{ dd($todos)->toJson() }} --}}
		<div class="col-sm-4">
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
		</div>
		<div class="col-sm-8">
			<div class="table-responsive">
				<h1 class="page-header text-center">Tus Tareas Pendientes</h1>
				<table class="table table-condensed table-hover">
					<thead>
						<tr>
							<th>Tarea:</th>
							<th>Programada Para:</th>
							<th colspan="2">Estado:</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($todos as $todo)
							@if (!$todo->done)
								<tr class="{{ $todo->done ? 'success' : '' }}">
									<td><a href="{{ route('admin.todos.show', $todo->id) }}">{{ $todo->name }}</a></td>
									<td class="col-xs-3">{{ $todo->due }}</td>
									<td class="col-xs-1">
										@if ($todo->done)
											<a href="{{ route('admin.todos.incompletar', $todo->id) }}" class="text-success"><i class="fa fa-check-circle-o"></i></a>
										@else
											<a href="{{ route('admin.todos.completar', $todo->id) }}" class="text-warning"><i class="fa fa-circle-o"></i></a>
										@endif								
									</td>
									<td class="col-xs-1">
										{!! delete_button('admin.todos.destroy', $todo->id) !!}							
									</td>
								</tr>
							@endif								
						@endforeach
					</tbody>
				</table>	


				<h1 class="page-header text-center">Tareas Completadas</h1>
				<table class="table table-condensed table-hover">
					<thead>
						<tr>
							<th>Tarea:</th>
							<th>Programada Para:</th>
							<th colspan="2">Estado:</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($todos as $todo)
							@if ($todo->done)
								<tr class="{{ $todo->done ? 'success' : '' }}">
									<td><a href="{{ route('admin.todos.show', $todo->id) }}">{{ $todo->name }}</a></td>
									<td class="col-xs-3">{{ $todo->due }}</td>
									<td class="col-xs-1">
										@if ($todo->done)
											<a href="{{ route('admin.todos.incompletar', $todo->id) }}" class="text-success"><i class="fa fa-check-circle-o"></i></a>
										@else
											<a href="{{ route('admin.todos.completar', $todo->id) }}" class="text-warning"><i class="fa fa-circle-o"></i></a>
										@endif								
									</td>
									<td class="col-xs-1">
										{!! delete_button('admin.todos.destroy', $todo->id) !!}							
									</td>
								</tr>
							@endif								
						@endforeach
					</tbody>
				</table>	
			</div>
		</div>		

		{!! $todos->render() !!}
		
	</div>

	
@endsection