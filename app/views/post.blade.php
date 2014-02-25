@extends('layout')

@section('content')

	<p>Logged in as {{{$email}}}</p>
    <h3>{{ $post->title }}</h3>
    <p> {{ $post->body }}</p>
    <p> Posted by: {{ $post->user->email }}</p>

    @if ($email === $post->user->email)
    	{{ Form::open(array('url' => 'delete/'.$post->id)) }}
    	{{ Form::submit('Delete this post') }}
  		{{ Form::close() }}  
  	@endif
 
@stop