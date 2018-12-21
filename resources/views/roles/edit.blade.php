@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3" >
			<div class="well">
				<div class="row">

					<div class="col-sm-12">
						{!! Form::model($role, ['route'=>['admin.roles.update', $role->id], 'method'=>'PUT', 'class'=>'', 'role'=>'form', 'autocomplete'=>"off"]) !!}

							<div class="form-group text-center">
								<legend>Editing Role {{ ucwords($role->role) }}
									<a href="{{ route('admin.roles.index') }}" class="pull-right"><i class="fa fa-list"></i></a>
								</legend>

									
							</div>				

							@include('roles._form')
			
							<div class="col-xs-12">	
								<div class="form-group">
									<button type="submit" class="btn btn-primary">Update</button>
								</div>
							</div>
							{{-- {!! delete_button('admin.roles.destroy', $role->id) !!} --}}						

						{!! Form::close() !!}					
							
						<div class="col-xs-12">
							<div class="form-group">
								{!! delete_button('admin.roles.destroy', $role->id, ['class'=>'btn btn-danger ', 'label'=>'Remove Role']) !!}
							</div>
						</div>
					</div>

				</div>

				<hr>
				<a href="{{ route('admin.roles.index') }}">Back to Roles List <i class="fa fa-arrow-circle-left"></i></a>
			</div>
		</div>
	</div>
@endsection