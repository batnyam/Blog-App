@extends('admin.sidebar')
		<div class="col-md-10 col-md-offset-2 content">
			<span class="title">Manage Users</span>

			<div class="col-md-8 edit-users">
				<span class="col-md-4 name">Name</span>
				<span class="col-md-4 mail">E-Mail</span>
				<span class="border"></span>

				@foreach ( $users as $user )
					<span class="col-md-4 name">{{ $user->name }}</span>
					<span class="col-md-4 mail">{{ $user->email }}</span>
					<span class="border"></span>
				@endforeach
			</div>
		</div>