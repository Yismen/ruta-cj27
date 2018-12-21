@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
			<div class="row">
				<div class="well">
					<h1 class="page-header text-center">Users List
					</h1>
					{!! Form::open(['route'=>['admin.users.search'], 'method'=>'GET', 'class'=>'', 'role'=>'form', 'autocomplete'=>"off"]) !!}		
						<div class="form-group {{ $errors->has('search') ? 'has-error' : null }}">
							{{-- {!! Form::label('search', 'Buscar:', ['class'=>'']) !!} --}}
							<div class="input-group">

								{!! Form::input('search', 'search', null, ['class'=>'form-control', 'placeholder'=>'Search User']) !!}
								<div class="input-group-btn">
									<button type="submit" class="btn btn-default">
										<i class="fa fa-search"></i>
									</button>
								</div>
								<div class="input-group-btn">
									<a href="{{ route('admin.users.index') }}" class="btn btn-default">Reset</a>
								</div>

							</div>	

						    <p class="help-block">Puede buscar por cualquier valor</p>

						</div>
					{!! Form::close() !!}
					<!-- /. Buscar -->
					
					@if ($users->count() > 0)
						<div class="table-responsive">
							<table class="table table-hover table-condensed">
								<thead>
									<tr>
										<th>Name:</th>
										<th>Email:</th>	
										<th>Role:</th>	
										<th>Edit:</th>	
									</tr>
								</thead>
								<tbody>
									@foreach ($users as $user)
										<tr>
											<td>
												<a href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a>
											</td>
											<td>
												<a href="mailto:{{ $user->email }}" target="_new">
													{{ $user->email }}
												</a>
											</td>
											<td>
												@if ($user->role)
													<a href="{{ route('admin.roles.show', $user->role->id) }}">
														{{ ucwords(camel_case($user->role->role)) }}
													</a>
												@endif
											</td>
											<td class="text-center">													
												<a href="{{ route('admin.users.edit', $user->id) }}">
													<i class="fa fa-pencil"></i>
												</a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
							{!! $users->render() !!}
						</div>
					@else
						<h3>No hay Usuarios registrados con el criterio de búsquda especificado..</h3>
					@endif
					

					<a href="{{ route('admin.roles.index') }}">Go to Roles Amin</a>
				</div>
			</div>
		</div>
	</div>

	
@endsection