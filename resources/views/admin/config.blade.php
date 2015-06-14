@extends('admin.sidebar')
<div class="col-md-10 col-md-offset-2 content">
			<span class="title">Edit Configuration</span>

			{!! Form::open(['url' => 'admin/config']) !!}
			<div class="col-md-6 edit-users">
				{!! Form::text('title', $config->title, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
				{!! Form::text('description', $config->description, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
				{!! Form::select('author', $user, '', array('class' => 'form-control')) !!}
				{!! Form::text('facebook', $config->facebook, ['class' => 'form-control', 'placeholder' => 'Facebook']) !!}
				{!! Form::text('google', $config->google, ['class' => 'form-control', 'placeholder' => 'Google']) !!}
				{!! Form::text('twitter', $config->twitter, ['class' => 'form-control', 'placeholder' => 'Twitter']) !!}
				{!! Form::text('youtube', $config->youtube, ['class' => 'form-control', 'placeholder' => 'Yotube']) !!}
				{!! Form::text('posts', $config->posts, ['class' => 'form-control', 'placeholder' => 'Posts per page']) !!}
				{!! Form::text('metakey', $config->metakey, ['class' => 'form-control', 'placeholder' => 'Metakey']) !!}
				{!! Form::text('theme', $config->theme, ['class' => 'form-control', 'placeholder' => 'Theme Folder Name']) !!}
				{!! Form::submit('Save', ['class' => 'btn btn-primary save'])!!}
			</div>

			{!! Form::close() !!}
		</div>