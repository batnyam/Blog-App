@extends('admin.sidebar')
<div class="col-md-10 col-md-offset-2 content">
				<span class="title">Post</span>
				
				{!! Form::open(['url' => 'admin/write-post']) !!}
				<div class="col-md-8 post-write form-group">

					{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Post Title']) !!}
					{!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Write a post...']) !!}	

				</div>

				<div class="col-md-4 post-options">
					<span class="title">Post options</span>
					<div class="form-group">
						{!! Form::select('category', $cat, '', array('class' => 'form-control')) !!}
					
						{!! Form::select('author', $users, '', array('class' => 'form-control')) !!}

						{!! Form::text('tag', null, ['class' => 'form-control', 'placeholder' => 'Write a Tags']) !!}
						{!! Form::textarea('metakey', null, ['class' => 'form-control textar', 'placeholder' => 'Write a Metakey']) !!}
						
						{!! Form::select('status', array('1' => 'Publish', '0' => 'Unpublish'), '', array('class' => 'form-control')) !!}
					</div>

					{!! Form::submit('Save', ['class' => 'btn btn-primary save pull-right']) !!}
				</div>

				{!! Form::close() !!}
		</div>