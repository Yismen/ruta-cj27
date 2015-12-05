@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
			<div class="well">
				<div class="row">
					<h3 class="page-header text-center">Detalles de la tarea [{{ $todo->name }}]</h3>

					<strong>Estado:</strong> <span class="label label-{{ $todo->done ? 'success' : 'warning' }}">{{ $todo->done ? "Completada" : "Pediente" }}</span>
					<br><strong>Establecida para: </strong>{{ $todo->due }}
					<br><strong>Detalles: </strong>{{ $todo->description }}

					<hr>

					<a href="{{ URL::previous() }}"><i class="fa fa-arrow-circle-left"></i> Regresar </a>
				</div>
			</div>
		</div>
	</div>
@endsection