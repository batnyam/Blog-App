<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Blog Application - Install</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />

		<style>
			body {
				margin: 0;
				padding: 20px;
			}

			input {
				margin-bottom: 10px;
			}

			h1 {
				text-align: center;
			}
		</style>
	</head>

	<body class="col-md-6 pull-left col-md-offset-3">
		<h1>Install - New User</h1>
		{!! Form::open(array('url' => '/admin/install-user')) !!}

			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Full Name']) !!}
			{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-Mail Address']) !!}
			{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'New Password']) !!}
			{!! Form::text('avatar', null, ['class' => 'form-control', 'placeholder' => 'Image URL']) !!}

		<center>{!! Form::submit('Save', ['class' => 'btn btn-success']) !!}</center>
		{!! Form::close() !!}
	</body>

</html>