@extends('layouts.admin')

@section('content')
	<div class="container">
		<h1 class="page-header text-center">Cumpleaños Choferes
			<a href="{{ route('admin.drivers.index') }}" class="pull-right"><i class="fa fa-list"></i></a>
		</h1>
		<div role="tabpanel">
		    <!-- Nav tabs -->
		    <ul class="nav nav-tabs" role="tablist">
		        <li role="presentation" class="active">
		            <a href="#birthdaysToday" aria-controls="birthdaysToday" role="tab" data-toggle="tab">Cumplen Años Hoy</a>
		        </li>
		        <li role="presentation">
		            <a href="#birthdaysThisMonth" aria-controls="birthdaysThisMonth" role="tab" data-toggle="tab">Cumpleañeros del Mes</a>
		        </li>
		        <li role="presentation">
		            <a href="#birthdaysNextMonth" aria-controls="birthdaysNextMonth" role="tab" data-toggle="tab">Cumpleañeros del Siguiente Mes</a>
		        </li>
		    </ul>
		
		    <!-- Tab panes -->
		    <div class="tab-content">
		        <div role="tabpanel" class="tab-pane active" id="birthdaysToday">
		        	@include('drivers._birthdays-today')
		        </div>

		        <div role="tabpanel" class="tab-pane" id="birthdaysThisMonth">
		        	@include('drivers._birthdays-this-month')
		        </div>

		        <div role="tabpanel" class="tab-pane" id="birthdaysNextMonth">
		        	@include('drivers._birthdays-next-month')
		        </div>
		    </div>
		</div>
	</div>
@endsection