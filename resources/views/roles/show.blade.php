@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
			<div class="well">
				<div class="row">
					<h3 class="page-header text-center">Role Details - {{ ucwords($role->role) }}</h3>
					<div class="col-sm-12">

						<strong>Description:</strong>
						<div class="col-xs-offset-1">
							<p>{{ $role->description }}</p>
						</div>
						<div class="form-group">
							<a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-warning"> Editar <i class="fa fa-pencil"></i></a>
						</div>
						@if ($role->users->count())
							<div class="panel panel-primary">
							  <!-- Default panel contents -->
							  <div class="panel-heading">Users Assigned To This Role</div>
							  <!-- Table -->
							  <div class="table-responsive">
							  	<table class="table table-hover table-condensed">
							  		<thead>
							  			<tr>
							  				<th></th>
							  			</tr>
							  		</thead>
							  		<tbody>
							  			@foreach ($role->users as $user)
							  				<tr>
								  				<td>{{ $user->name }}</td>
								  				<td>{{ $user->email }}</td>
								  				<td><a href="{{ route('admin.users.edit', $user->id) }}"><span class="fa fa-pencil"></span></a></td>
								  			</tr>
							  			@endforeach								  			
							  		</tbody>
							  	</table>
							  </div>
							</div>
						@endif

					</div>
						{{-- {{ $role }} --}}
					<hr>
					<div class="col-sm-12 form-group">
						<a href="{{ route('admin.roles.index') }}" class="pull-left"><i class="fa fa-arrow-circle-left"></i> Regresar </a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection