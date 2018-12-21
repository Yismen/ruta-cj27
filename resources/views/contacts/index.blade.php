@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
			<div class="row">
				<div class="well">
					<h1 class="page-header text-center">Listado de Contactos
						<a href="{{ route('admin.contacts.create') }}">
							<span class="fa fa-plus"></span>
						</a> 
					</h1>
					{!! Form::open(['route'=>['admin.contacts.search'], 'method'=>'GET', 'class'=>'', 'role'=>'form', 'autocomplete'=>"off"]) !!}		
						<div class="form-group {{ $errors->has('search') ? 'has-error' : null }}">
							{!! Form::label('search', 'Buscar:', ['class'=>'']) !!}
							<div class="input-group">
								{!! Form::input('search', 'search', null, ['class'=>'form-control', 'placeholder'=>'Buscar']) !!}
								<div class="input-group-btn">
									<button type="submit" class="btn btn-default">
										<i class="fa fa-search"></i>
									</button>
								</div>
								<div class="input-group-btn">
									<a href="{{ route('admin.contacts.index') }}" class="btn btn-default">All</a>
								</div>
							</div>							
						    <p class="help-block">Puede buscar por cualquier valor</p>
						</div>
					
					{!! Form::close() !!}
					<!-- /. Buscar -->
{{--  --}}
					@if ($contacts->count() > 0)
						<div class="table-responsive">
							<table class="table table-hover table-condensed">
								<thead>
									<tr>
										<th>Nombre:</th>
										<th>Celular:</th>
										<th>Casa:</th>
										<th>Email:</th>	
										<th class="col-xs-1">Foto:</th>	
										<th>Edit:</th>	
									</tr>
								</thead>
								<tbody>
									@foreach ($contacts as $contact)
										<tr>
											<td>
												<a href="{{ route('admin.contacts.show', $contact->id) }}">{{ $contact->name }}</a>
											</td>
											<td>{{ $contact->mobile }}</td>
											<td>{{ $contact->secondary }}</td>
											<td>
												<a href="mailto:{{ $contact->email }}?Subject=Saludos!" target="_new">
													{{ $contact->email }}
												</a>
											</td>
											<td>
												<a href="{{ asset($contact->photo) }}">
													<img src="{{ asset($contact->photo) }}" class="img-responsive" alt="Image" height="50">
												</a>
											</td>
											<td>
												@if ($contact->user->id == auth()->user()->id)
													<a href="{{ route('admin.contacts.edit', $contact->id) }}"><i class="fa fa-pencil"></i></a>
												@endif
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					@else
						<h3>No hay Contacts registrados con el criterio de búsquda especificado..</h3>
					@endif

					{!! $contacts->render() !!}
				</div>
			</div>
		</div>
	</div>

	
@endsection