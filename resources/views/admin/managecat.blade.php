@extends('admin.sidebar')
		<div class="col-md-10 col-md-offset-2 content">
			<span class="title">Manage Category</span>

			@if ( $cat != null )
			{!! Form::open(array('url' => '/admin/catedit-'.$cat->id )) !!}
				<div class="form-group col-md-8 category">
					{!! Form::text('name', $cat->name, ['class' => 'form-control']) !!}
					{!! Form::textarea('description', $cat->description, array('class' => 'form-control')) !!}
					{!! Form::select('menu', array('1' => 'Publish', '0' => 'Unpublish' ), '', array( 'class' => 'form-control' )) !!}
					{!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
				</div>
			{!! Form::close() !!}

			@else

			<div class="col-md-9 edit-users">
				<span class="col-md-4 name">Name</span>
				<span class="col-md-7 mail">Description</span>
				<span class="col-md-1 edit"></span>
				<span class="border"></span>

				@foreach ( $category as $cat )
					<span class="col-md-4 name">{{ $cat->name }}</span>
					<span class="col-md-7 mail">{{ $cat->description }}</span>
					<span class="col-md-1 edit"><a href="{{ URL::to('/admin/catedit-'.$cat->id) }}">Edit</a></span>
					<span class="border"></span>
				@endforeach
			</div>

			@endif
		</div>