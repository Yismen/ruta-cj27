<!-- resources/views/emails/password.blade.php -->


<h2>Password Reset Requirement</h2>

<hr>

<p>You received this email because you required to change or reset your password. To proceed just click on the following link:</p>

<p><h3><a href="{{ url('password/reset/'.$token) }}" class="link">Reset My Password</a></h3></p>

<p>If you did not require to change or reset your password just ignore this email and use your current credentias to access the app.</p>

<p>Thank you for being part of our family!</p>