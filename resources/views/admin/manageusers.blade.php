@extends('admin.sidebar')
		<div class="col-md-10 col-md-offset-2 content">
			<span class="title">Manage Users</span>

			@if ( $user != null )

			{!! Form::open(array('url' => '/admin/edituser-'.$user->id )) !!}
				<div class="form-group col-md-8 category">
					{!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
					{!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
					{!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) !!}
					{!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
				</div>
			{!! Form::close() !!}

			@else

			<div class="col-md-8 edit-users">
				<span class="col-md-5 name">Name</span>
				<span class="col-md-5 mail">E-Mail</span>
				<span class="col-md-2 edit"></span>
				<span class="border"></span>

				@foreach ( $users as $user )
					<span class="col-md-5 name">{{ $user->name }}</span>
					<span class="col-md-5 mail">{{ $user->email }}</span>
					<span class="col-md-2 edit"><a href="{{ URL::to('/admin/edituser-'.$user->id) }}">Edit</a></span>
					<span class="border"></span>
				@endforeach
			</div>

			@endif
		</div>