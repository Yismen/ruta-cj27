@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
			<div class="well">
				<div class="row">
					<h3 class="page-header text-center">Detalles del Contacto [{{ $contact->name }}]</h3>
					
					<div class="col-sm-6">
						<img src="http://placehold.it/500x300" class="img-responsive" alt="Image">
					</div>

					<div class="col-sm-6">

						<strong>Celular</strong>
						<div class="col-xs-offset-1">
							{{ $contact->mobile }}
						</div>

						<strong>Tel. Secundario</strong>
						<div class="col-xs-offset-1">
							{{ $contact->secondary }}
						</div>

						<strong>Email</strong>
						<div class="col-xs-offset-1">
							{{ $contact->email }}
						</div>

						<strong>Dirección</strong>
						<div class="col-xs-offset-1">
							{{ $contact->address }}
						</div>

						<strong>Tel. Secundario</strong>
						<div class="col-xs-offset-1">
							{{ $contact->secondary }}
						</div>

						<strong>Fecha Cumpleaños</strong>
						<div class="col-xs-offset-1">
							{{ $contact->dob }}
						</div>

					</div>
						{{-- {{ $contact }} --}}
					<hr>

					<div class="col-sm-8 col-sm-offset-2">
						<a href="{{ URL::previous() }}" class="pull-left"><i class="fa fa-arrow-circle-left"></i> Regresar </a>
						<a href="{{ route('admin.contacts.edit', $contact->id) }}" class="pull-right text-warning"> Editar <i class="fa fa-pencil"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection