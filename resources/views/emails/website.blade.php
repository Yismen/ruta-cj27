<style>
	.padding {
		padding: 30px;
		margin: 10px;
		/*background-color: #515543;*/
	}
</style>
<h3>{{ ucwords($data['subject']) }}</h3>
<hr>
<div class="padding">
	<strong>Name:</strong> {{ ucwords($data['name']) }}<br>
	<strong>Email:</strong> {{ $data['email'] }}<br>
	<strong>Phone:</strong> {{ $data['phone'] }}<br>

	<?php
		$messages = nl2br($data['message']);

		$messages = explode('<br />', $messages);
	?>
	<strong>Message:</strong> <br> 	
		@foreach ($messages as $message)
			{{ ucfirst($message) }} <br>
		@endforeach
	<br>
</div>