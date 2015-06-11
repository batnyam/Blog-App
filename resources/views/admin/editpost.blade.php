@extends('admin.sidebar')
		<div class="col-md-10 col-md-offset-2 content">
			<span class="title">Edit post</span>

			<div class="col-md-12 edit-users">
				<span class="col-md-4 name">Title</span>
				<span class="col-md-3 mail">Category</span>
				<span class="col-md-2 name">Author</span>
				<span class="col-md-2 edit">Status</span>
				<span class="col-md-1 edit"></span>
				<span class="border"></span>

				@foreach ( $posts as $post )
					<span class="col-md-4 name">{{ $post->Title }}</span>
					<span class="col-md-3 mail">{{ $post->Category }}</span>
					<span class="col-md-2 name">{{ $post->Author }}</span>
					<span class="col-md-2 edit">@if ( $post->Status == 1 ) {{ 'Published' }} @else {{ 'Unpublished' }} @endif</span>
					<span class="col-md-1 edit">Edit</span>
					<span class="border"></span>
				@endforeach
			</div>
		</div>