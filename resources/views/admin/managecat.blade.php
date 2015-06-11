@extends('admin.sidebar')
		<div class="col-md-10 col-md-offset-2 content">
			<span class="title">Manage Category</span>

			<form class="form-group col-md-8 category">
				<input type="text" placeholder="Name" class="form-control">
				<textarea placeholder="Description" class="form-control"></textarea>
				<button type="submit" class="btn btn-primary pull-right">Save</button>
			</form>

			<div class="col-md-9 edit-users">
				<span class="col-md-4 name">Name</span>
				<span class="col-md-7 mail">Description</span>
				<span class="col-md-1 edit"></span>
				<span class="border"></span>

				@foreach ( $category as $cat )
					<span class="col-md-4 name">{{ $cat->name }}</span>
					<span class="col-md-7 mail">{{ $cat->description }}</span>
					<span class="col-md-1 edit">Edit</span>
					<span class="border"></span>
				@endforeach
			</div>
		</div>