<aside class="sidebar">

	<div class="col-xs-12 logo">

		<img class="col-xs-12" src="img/logo.jpg" />

	</div>
	
	<div class="col-md-9 logo-text">{{ $config->title }}</div>

	<div class="col-md-12 slogan">

		<b>{{ $config->description }}</b>

	</div>
	
	<div class="col-md-9 seperator"></div>

	<div class="col-md-12 nav_menu">
	
		<ul>
			<a href="#"><li>Homepage</li></a>
			<a href="#"><li>Contact us</li></a>
		</ul>

	</div>

	<div class="col-md-9 seperator"></div>

	<div class="col-md-12 search">

		<input type="text" class="form-control"placeholder="Search..."></input>

	</div>

	<div class="col-md-12 social">

		<a href="{{ $config->facebook }}" target="_blank"><img class="col-md-3 img" src="img/fb.png" /></a>
		<a href="{{ $config->google }}" target="_blank"><img class="col-md-3 img" src="img/g+.png" /></a>
		<a href="{{ $config->twitter }}" target="_blank"><img class="col-md-3 img" src="img/tw.png" /></a>
		<a href="{{ $config->youtube }}" target="_blank"><img class="col-md-3 img" src="img/yt.png" /></a>
		
	</div>
		
</aside>