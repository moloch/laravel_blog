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
	<p>Logged in as {{{$email}}}</p>
	<p>Posts</p>
	@foreach ($posts as $post)
    	<a href="post/view/{{$post->id}}">
    		<h3>{{ $post->title }}</h3>
    	</a>
    	<p> {{ $post->text }}</p>
    	<p> Posted by: {{ $post->user->email }}</p>
	@endforeach
@endif
 
@stop