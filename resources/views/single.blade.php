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
			</div>
		</section>