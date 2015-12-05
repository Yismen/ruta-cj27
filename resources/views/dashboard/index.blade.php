@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="well">
			<h1 class="text-center">Bienvenido {{ strtoupper(auth()->user()->name) }}</h1>
		</div>
	</div>
	<div class="container">
		<div class="col-sm-12">
			<div class="row">
				{{-- Tareas --}}
				<div class="col-xs-4">
					<div class="panel panel-primary">
						  <div class="panel-heading">
								<h1 class="text-center huge-text">{{ $user->birthdaysToday }}</h1>
								<p>Personas cumplen años hoy</p>
						  </div>
						  <div class="panel-body">
								<h5>
									<a href="{{ route('admin.drivers.birthdays') }}"><span class="pull-left">Ver Cumpleañeros</span> <div class="fa fa-arrow-circle-right pull-right"></div></a>								
								</h5>
						  </div>
					</div>
				</div>
				{{-- Tareas --}}
				<div class="col-xs-4">
					<div class="panel panel-primary">
						  <div class="panel-heading">
								<h1 class="text-center huge-text">{{ $user->birthdaysThisMonth }}</h1>
								<p>Personas cumplen años este mes</p>
						  </div>
						  <div class="panel-body">
								<h5>
									<a href="{{ route('admin.drivers.birthdays') }}"><span class="pull-left">Ver Cumpleañeros</span> <div class="fa fa-arrow-circle-right pull-right"></div></a>								
								</h5>
						  </div>
					</div>
				</div>
				{{-- Tareas --}}
				<div class="col-xs-4">
					<div class="panel panel-primary">
						  <div class="panel-heading">
								<h1 class="text-center huge-text">{{ $user->birthdaysNextMonth }}</h1>
								<p>Personas cumplen años el siguiente mes</p>
						  </div>
						  <div class="panel-body">
								<h5>
									<a href="{{ route('admin.drivers.birthdays') }}"><span class="pull-left">Ver Cumpleañeros</span> <div class="fa fa-arrow-circle-right pull-right"></div></a>								
								</h5>
						  </div>
					</div>
				</div>
			</div>
			{{-- /. Birthdays --}}

			<hr>

			
			<div class="row">
				{{-- Tareas --}}
				<div class="col-xs-6 col-sm-4 col-lg-3">
					<div class="panel panel-primary">
						  <div class="panel-heading">
								<h1 class="text-center huge-text">{{ $user->driversCount }}</h1>
								<p>Choferes Registrados</p>
						  </div>
						  <div class="panel-body">
								<h5>
									<a href="{{ route('admin.drivers.index') }}"><span class="pull-left">Ver Choferes</span> <div class="fa fa-arrow-circle-right pull-right"></div></a>								
								</h5>
						  </div>
					</div>
				</div>
				{{-- Tareas --}}
				<div class="col-xs-6 col-sm-4 col-lg-3">
					<div class="panel panel-primary">
						  <div class="panel-heading">
								<h1 class="text-center huge-text">{{ $user->todosCount }}</h1>
								<p>Tareas pendientes</p>
						  </div>
						  <div class="panel-body">
								<h5>
									<a href="{{ route('admin.todos.index') }}"><span class="pull-left">Ver Tareas</span> <div class="fa fa-arrow-circle-right pull-right"></div></a>								
								</h5>
						  </div>
					</div>
				</div>
			</div>
		</div>
		{{ $user }}

	</div>
@endsection