<html>
	<head>
		<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}" />
		<style>
			.login-form {
				background: #ecf0f1;
				box-shadow: 1px 2px 1px #95a5a6;
				margin-top: 100px;
			}
			.username {
				margin-bottom: 10px;
			}
			.password {
				margin-bottom: 10px;
			}
		</style>
		<title>Admin Login</title>
	</head>

<body>
	<div class="login-form col-md-2 col-md-offset-5">

		<h6>{{ $label }}</h6>
		{!! Form::open(array('url' => '/admin/login')) !!}
			{!! Form::text('username', null, array('class' => 'form-control username', 'placeholder' => 'Username')) !!}
			{!! Form::password('password', array('class' => 'form-control password', 'placeholder' => 'Password')) !!}
			<center>{!! Form::submit('Login', array('class' => 'btn btn-success')) !!}</center>
		{!! Form::close() !!}
	</div>
</body>

</html>