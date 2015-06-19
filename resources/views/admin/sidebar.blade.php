<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Admin</title>

		<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/admin-style.css') }}" rel="stylesheet">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body class="container-fluid">

		<div class="col-md-2 sidebar">
			<div class="col-md-12 logo">{{ $config->title }}</div>
			<div class="col-md-12 desc">{{ $config->description }}</div>

			<div class="col-md-12 button-group">
				<a href="{{ URL::to('/admin') }}"><li>Home</li></a>
				<a href="{{ URL::to('/admin/write-post') }}"><li>Write a Post</li></a>
				<a href="{{ URL::to('/admin/edit-post') }}"><li>Edit a Post</li></a>
				<a href="{{ URL::to('/admin/category') }}"><li>Manage a Category</li></a>
				<a href="{{ URL::to('/admin/users') }}"><li>Manage a Users</li></a>
				<a href="{{ URL::to('/admin/config') }}"><li>Edit Configuration</li></a>
				<a href="{{ URL::to('/') }}" target="_blank"><li>Visit Site</li></a>
			</div>

			<h1></h1>
			<div class="col-md-12 navbar-bottom">
				<a href="{{ URL::to('/logout') }}" ><i class="fa fa-power-off"></i></a>
			</div>
		</div>