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

			select {
				margin-bottom: 10px;
			}
		</style>
	</head>

	<body class="col-md-6 pull-left col-md-offset-3">
		<h1>Install - New Category</h1>
		{!! Form::open(array('url' => '/install/install-category')) !!}
		
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Category name']) !!}
			{!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Category description']) !!}
			{!! Form::select('menu', array( '1' => 'Publish', '2' => 'Unpublish'), null, array('class' => 'form-control') ) !!}
			{!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
		
		{!! Form::close() !!}
	</body>

</html>