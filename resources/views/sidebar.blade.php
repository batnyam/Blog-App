<aside class="sidebar">

	<div class="col-xs-12 logo">

		<img class="col-xs-12" src="{{ asset('img/logo.jpg') }}" />

	</div>
	
	<div class="col-md-9 logo-text">{{ $config->title }}</div>

	<div class="col-md-12 slogan">

		<b>{{ $config->description }}</b>

	</div>
	
	<div class="col-md-9 seperator"></div>

	<div class="col-md-12 nav_menu">
	
		<ul>
			<a href="{{ URL::to('/') }}"><li>Homepage</li></a>
			@foreach($cats as $cat)
				<a href="{{ URL::to('/cat/tech') }}"><li>{{ $cat->name }}</li></a>
			@endforeach
			
		</ul>

	</div>

	<div class="col-md-9 seperator"></div>

	<div class="col-md-12 search">

		<input type="text" class="form-control"placeholder="Search..."></input>

	</div>

	<div class="col-md-12 social">

		<a href="{{ $config->facebook }}" target="_blank"><img class="col-md-3 img" src="{{ asset('img/fb.png') }}" /></a>
		<a href="{{ $config->google }}" target="_blank"><img class="col-md-3 img" src="{{ asset('img/g+.png') }}" /></a>
		<a href="{{ $config->twitter }}" target="_blank"><img class="col-md-3 img" src="{{ asset('img/tw.png') }}" /></a>
		<a href="{{ $config->youtube }}" target="_blank"><img class="col-md-3 img" src="{{ asset('img/yt.png') }}" /></a>
		
	</div>
		
</aside>