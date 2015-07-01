@extends('header')
@extends('sidebar')
		<section class="col-md-10 wrapper">
			<div class="col-md-9 content_wrapper">
				
				@foreach($posts as $post)
					<div class="col-md-12 entry">
						<div class="col-md-2 date">{{ $post->created_at->format('M d, Y') }}</div>
						<?php $link = '/postread-'.$post->id; ?>
						<div class="col-md-12 title"><a href="{{ URL::to($link) }}">{{ $post->Title }}</a></div>
						<div class="col-md-12 post"><?php echo $post->Content; ?></div>

						<div class="col-md-12 post_about">
							<div class="col-md-3 author"><span class="glyphicon glyphicon-user"></span>
							<?php $author = '/author/'.$post->Author; ?>
							<a href="{{ URL::to($author) }}">{{ $post->Author }}</a></div>
							<div class="col-md-3 tags"><span class="glyphicon glyphicon-tag"></span>{{ $post->tag }}</div>
						</div>
					</div>
				@endforeach

				<div class="col-md-12 pagenav">
					<?php echo $posts->render() ?>
				</div>
			</div>
		</section>