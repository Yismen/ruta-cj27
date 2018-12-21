@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
			<div class="well">
				<div class="row">
					<h3 class="page-header text-center">User Details - {{ $user->name }}</h3>
					
					<div class="col-sm-6">
						<img src="http://placehold.it/500x300" class="img-responsive" alt="Image">
					</div>

					<div class="col-sm-6">

						<strong>Email Address:</strong>
						<div class="col-xs-offset-1">
							{{ $user->email }}
						</div>

						<strong>Role:</strong>
						<div class="col-xs-offset-1">
							{{ ucwords($user->role->role) }}
						</div>

					</div>
						{{-- {{ $user }} --}}
					<hr>

					<div class="col-sm-8 col-sm-offset-2">
						<a href="{{ route('admin.users.index') }}" class="pull-left"><i class="fa fa-arrow-circle-left"></i> Regresar </a>
						<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning pull-right"> Editar <i class="fa fa-pencil"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection