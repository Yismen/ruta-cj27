@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="well">
				
				<div class="row">
					<div class="col-sm-12">
					
						<h2>Details of the message...</h2>
						<strong>Name: </strong>
							{{ $message->name }}

						<br> <strong>Subject: </strong>
							{{ $message->subject }}

						<br> <strong>Phone: </strong>
							{{ $message->phone }}

						<br> <strong>Email: </strong>
							<a href="mailto:{{ $message->email }}" target="_new">{{ $message->email }}</a>

						<br> <strong>Message:</strong> <br>
							{{ $message->message }}						

						<hr>
						<a href="{{ route('admin.messages.index') }}">Return to the messages list <i class="fa fa-arrow-circle-left"></i></a>



						{!! Form::open(['route'=>['admin.messages.update', $message->id], 'method'=>'PUT', 'class'=>'', 'role'=>'form', 'autocomplete'=>"off"]) !!}

							@if ($message->viewed)
								<div class="form-group">
									<h1 class="text-info">Would you surely want to mark this message as Pending?</h1>
									<button type="submit" class="btn btn-info">Mark as Pending</button>
								</div>
							@else

								<div class="form-group">
									<h1 class="text-warning">Would you surely want to mark this message as viewed?</h1>
									<button type="submit" class="btn btn-warning">Mark as Viewed</button>
								</div>
							
							@endif
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection