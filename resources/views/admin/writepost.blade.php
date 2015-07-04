@extends('admin.sidebar')
<div class="col-md-10 col-md-offset-2 content">
				<span class="title">Post</span>

				@if ( $post == null )
					{!! Form::open(['url' => 'admin/write-post']) !!}
					<div class="col-md-8 post-write form-group">

						{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Post Title']) !!}
						<pre>Length: <span id="length">0</span></pre>
						{!! Form::textarea('content', '', ['class' => 'post-entry', 'id' => 'editor1']) !!}
						<button class="btn btn-success" type="button" data-toggle="modal" data-target="#media">Image</button>
					</div>

					<div class="col-md-4 post-options">
						<span class="title">Post options</span>
						<div class="form-group">
							{!! Form::select('category', $cat, '', array('class' => 'form-control')) !!}
							{!! Form::select('author', $users, '', array('class' => 'form-control')) !!}
							{!! Form::text('tag', null, ['class' => 'form-control', 'placeholder' => 'Write a Tags']) !!}
							{!! Form::textarea('metakey', $config->metakey, ['class' => 'form-control textar', 'placeholder' => 'Write a Metakey']) !!}
							{!! Form::text('excerpt', null, ['class' => 'form-control', 'placeholder' => 'Post Intro']) !!}
							{!! Form::select('status', array('1' => 'Publish', '0' => 'Unpublish'), '', array('class' => 'form-control')) !!}
						</div>

						{!! Form::submit('Save', ['class' => 'btn btn-primary save pull-right']) !!}
					</div>

					{!! Form::close() !!}
				@else
					{!! Form::open(['url' => 'admin/editpost-'.$post->id]) !!}
					<div class="col-md-8 post-write form-group">

						{!! Form::text('title', $post->Title, ['class' => 'form-control', 'placeholder' => 'Post Title']) !!}
						<pre>Length: <span id="length">0</span></pre>
						{!! Form::textarea('content', $post->Content, ['class' => 'post-entry', 'id' => 'editor1']) !!}
						<span class="btn btn-success">Image</span>
					</div>

					<div class="col-md-4 post-options">
						<span class="title">Post options</span>
						<div class="form-group">
							{!! Form::select('category', $cat, '', array('class' => 'form-control')) !!}
							{!! Form::select('author', $users, '', array('class' => 'form-control')) !!}
							{!! Form::text('tag', $post->tag, ['class' => 'form-control', 'placeholder' => 'Write a Tags']) !!}
							{!! Form::textarea('metakey', $post->metakey, ['class' => 'form-control textar', 'placeholder' => 'Write a Metakey']) !!}
							{!! Form::text('excerpt', $post->excerpt, ['class' => 'form-control', 'placeholder' => 'Post Intro']) !!}
							{!! Form::select('status', array('1' => 'Publish', '0' => 'Unpublish'), '', array('class' => 'form-control')) !!}
						</div>

						{!! Form::submit('Save', ['class' => 'btn btn-primary save pull-right']) !!}
					</div>
					{!! Form::close() !!}
				@endif

				<div class="modal fade" id="media" role="dialog" tabindex="-1">
					<div class="modal-content">
						@foreach($images as $img)
							<img src="{{ $img }}" width="200px" height="200px" alt="Media" />
						@endforeach

						<button type="button" data-dismiss="modal">Close</button>
					</div>
				</div>
		</div>
		</div>
