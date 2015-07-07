@extends('admin.sidebar')
		<div class="col-md-10 col-md-offset-2 content">
			<span class="title">Edit post</span>

			<ul class="nav nav-tabs" role="tablist">
				<li class="active"><a href="#available" role="tab" aria-controls="available" data-toggle="tab">Available</a></li>
				<li><a href="#trash" role="tab" aria-controls="trash" data-toggle="tab">Trash</a></li>
			</ul>

			<div class="col-md-12 edit-users">
				<span class="col-md-4 name">Title</span>
				<span class="col-md-2 mail">Category</span>
				<span class="col-md-2 name">Author</span>
				<span class="col-md-2 edit">Status</span>
				<span class="col-md-1 edit"></span>
				<span class="col-md-1 edit"></span>
				<span class="border"></span>

				<div class="tab-content">
					<div id="available" class="tab-pane active">
						@foreach ( $posts as $post )
							<span class="col-md-4 name">{{ $post->Title }}</span>
							<span class="col-md-2 mail">{{ $post->Category }}</span>
							<span class="col-md-2 name">{{ $post->Author }}</span>
							<span class="col-md-2 edit">@if ( $post->Status == 1 ) {{ 'Published' }} @else {{ 'Unpublished' }} @endif</span>
							<span class="col-md-1 edit"><a href="{{ URL::to('admin/editpost-'.$post->id) }}">Edit</a></span>
							<span class="col-md-1 edit"><a href="{{ URL::to('admin/trash-post-'.$post->id) }}">X</a></span>
							<span class="border"></span>
						@endforeach
					</div>

					<div id="trash" class="tab-pane">
						@foreach ( $trashs as $trash )
						<span class="col-md-4 name">{{ $trash->Title }}</span>
						<span class="col-md-2 mail">{{ $trash->Category }}</span>
						<span class="col-md-2 name">{{ $trash->Author }}</span>
						<span class="col-md-2 edit">@if ( $trash->Status == 1 ) {{ 'Published' }} @else {{ 'Unpublished' }} @endif</span>
						<span class="col-md-1 edit"><a href="{{ URL::to('admin/editpost-'.$trash->id) }}">Edit</a></span>
						<span class="col-md-1 edit"><a href="{{ URL::to('admin/delete-post-'.$trash->id) }}">X</a></span>
						<span class="border"></span>
						@endforeach
					</div>
			</div>
		</div>
