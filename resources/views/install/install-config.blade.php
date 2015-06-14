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
		<h1>Install - New Configuration</h1>
		{!! Form::open(array('url' => '/install/install-config')) !!}

			{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Site Title']) !!}
			{!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Site Description']) !!}
			{!! Form::text('facebook', null, ['class' => 'form-control', 'placeholder' => 'Facebook URL']) !!}
			{!! Form::text('youtube', null, ['class' => 'form-control', 'placeholder' => 'Youtube URL']) !!}
			{!! Form::text('twitter', null, ['class' => 'form-control', 'placeholder' => 'Twitter URL']) !!}
			{!! Form::text('google', null, ['class' => 'form-control', 'placeholder' => 'Google URL']) !!}
			{!! Form::text('posts', null, ['class' => 'form-control', 'placeholder' => 'Posts per page']) !!}
			{!! Form::text('metakey', null, ['class' => 'form-control', 'placeholder' => 'Metakeys']) !!}

		<center>{!! Form::submit('Save', ['class' => 'btn btn-success']) !!}</center>
		{!! Form::close() !!}
	</body>

</html>