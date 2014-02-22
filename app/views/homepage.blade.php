@extends('layout')

@section('content')

@if (!$isAuth)
   <h2>Login</h2>
   {{ Form::open(array('url' => 'login')) }}
   <ul>
      <li>
    	{{ Form::label('email', 'Email:') }}
    	{{ Form::text('email') }}
      </li>
      <li>
    	{{ Form::label('password', 'Password:') }}
    	{{ Form::password('password') }}
      </li>
    </ul>
    {{ Form::submit('Login') }}
    {{ Form::close() }} 
@else
	<p>Posts</p>
@endif
 
@stop