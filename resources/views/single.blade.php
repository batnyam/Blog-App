@extends('header')
@extends('sidebar')
		<section class="col-md-10 wrapper">
			<div class="col-md-9 content_wrapper">

				<div class="col-md-12 entry">
					<div class="col-md-2 date">{{ $post->created_at->format('M d, Y') }}</div>
					<div class="col-md-12 title">{{ $post->Title }}</div>
					<div class="col-md-12 post">{{ $post->Content }}</div>

					<div class="col-md-12 post_about">
						<?php $author = '/author/'.$post->Author; ?>
						<div class="col-md-3 author"><a href="{{ URL::to($author) }}"><span class="glyphicon glyphicon-user"></span>{{ $post->Author }}</a></div>
						<div class="col-md-3 tags"><span class="glyphicon glyphicon-tag"></span>{{ $post->tag }}</div>
					</div>
				</div>	

				<div class="col-md-12 comment-form">
					{!! Form::open(array('url' => '/comment-'.$post->id)) !!}
						{!! Form::text('author_name', 'Guest', array('class' => 'comment-guest form-control', 'placeholder' => 'Name')) !!}
						{!! Form::text('author_email', '',array('class' => 'comment-mail form-control', 'placeholder' => 'E-Mail')) !!}
						{!! Form::text('author_ip', '', array('style' => 'display:none')) !!}
						{!! Form::text('post_id', '', array('style' => 'display:none')) !!}
						{!! Form::textarea('comment', '', array('class' => 'form-control', 'placeholder' => 'Comment')) !!}

						{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
					{!! Form::close() !!}
				</div>

				<div class="col-md-12 comments">
					@foreach($comments as $comment)
						<div class="col-md-12 comment">
							<span class="avatar"><img src="{{ asset('/img/avatar.jpg') }}" ></span>
							<span class="name">{{ $comment->author_name }}</span>
							<br>
							<span class="date">{{ $comment->created_at->format('M d, Y') }}</span>
							<br>
							<span class="comment">{{ $comment->comment }}</span>
						</div>
					@endforeach
				</div>
			</div>
		</section>