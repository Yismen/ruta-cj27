<style>
	.link {
		margin: 0 5px;
	}
</style>
@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
			<div class="well">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="page-header text-center">
							Roles List, with Users
							<a href="{{ route('admin.roles.create') }}" class="link"><i class="fa fa-plus"></i></a>
						</h1>
						{!! Form::open(['url'=>['admin/roles/search'], 'method'=>'GET', 'class'=>'', 'role'=>'form', 'autocomplete'=>"off"]) !!}		
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
										<a href="{{ route('admin.roles.index') }}" class="btn btn-default">Reset</a>
									</div>

								</div>	

							    <p class="help-block">Puede buscar por cualquier valor</p>

							</div>
						{!! Form::close() !!}
						<!-- /. Buscar -->
						
						@if ($roles->count() > 0)
							@foreach ($roles as $role)
								<div class="col-sm-6">
									<ul class="list-group">
										<li class="list-group-item list-group-item-info">
											<a href="{{ route('admin.roles.show', $role->id) }}">{{ ucwords($role->role) }}</a>
											<a href="{{ route('admin.roles.edit', $role->id) }}" 
												class="link pull-right"
												data-toggle="tooltip" data-placement="bottom" title="Edit Role"
												>
												<i class="fa fa-pencil"></i>
											</a> {{-- Edit Role --}}
											<span class="pull-right link" 
												data-toggle="tooltip" 
												data-placement="bottom" 
												title="Remove Role"
												>
												{!! delete_button('admin.roles.destroy', $role->id, []) !!}
											</span>
										</li>
										@foreach ($role->users as $user)
											<li class="list-group-item">{{ $user->name }}
												<a href="{{ route('admin.users.edit', $user->id) }}" 
													class="link pull-right"
													data-toggle="tooltip" data-placement="bottom" title="Edit User">
													<i class="fa fa-pencil"></i>

												</a> {{-- Edit User --}}
												<a href="{{ route('admin.roles.detatch_user',[ $user->id, $role->id]) }}" 
													class="link pull-right"
													data-toggle="tooltip" data-placement="bottom" title="Detatch this User">

													<i class="fa fa-scissors"></i>
						
												</a> {{-- Remove User --}}
											</li>
										@endforeach
									</ul>
								</div>
							@endforeach

							<hr>
							<div class="clearfix row">
								@if($usersWithoutRoles->count())
									<div class="col-sm-8 col-sm-offset-2">
										<div class="table-responsive">
											<h3>Users without a role</h3>
											<table class="table table-hover table-condensed">
												<thead>
													<tr>
														<th>Name:</th>
														<th>Email:</th>
														<th>Edit:</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($usersWithoutRoles as $user)
														<tr>
															<td>{{ $user->name }}</td>
															<td><a href="mailto:{{ $user->email }}" target="_new">{{ $user->email }}</a></td>
															<td>
																<a href="{{ route('admin.users.edit', $user->id) }}" 
																	class="link pull-right"
																	data-toggle="tooltip" data-placement="bottom" title="Edit User">
																	<i class="fa fa-pencil"></i>

																</a> {{-- Edit User --}}
															</td>
														</tr>													
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
								@endif
							</div>
							<div class="clearfix row">
								{!! $roles->render() !!}
							</div>
						@else
							<h3>No hay Usuarios registrados con el criterio de búsquda especificado..</h3>
						@endif
					</div>

				</div>
			</div>
		</div>
	</div>

	
@endsection