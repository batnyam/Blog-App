<h5>{{ $label }}</h5>
{!! Form::open(array('url' => '/admin/login')) !!}
	{!! Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Username')) !!}
	{!! Form::password('password', null, array('placeholder' => 'Password')) !!}
	{!! Form::submit('Login') !!}
{!! Form::close() !!}