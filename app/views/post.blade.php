@extends('layout')

@section('content')

	<p>Logged in as {{{$email}}}</p>
    <h3>{{ $post->title }}</h3>
    <p> {{ $post->text }}</p>
    <p> Posted by: {{ $post->user->email }}</p>
    
    @if(count($post->comments) !== 0)
    	<h3>Comments</h3>
    @endif
    @foreach ($post->comments as $comment)
        <p>{{ $post->user->email }}:</p>
    	<p>{{ $comment->text }}</p>
    @endforeach
    
    {{ Form::open(array('url' => 'comment/new/'.$post->id)) }}
  	<p>Comment:</p>
  	<p>{{ Form::textarea('text') }}</p>
    {{ Form::submit('Add comment') }}
  	{{ Form::close() }}  

    @if ($email === $post->user->email)
        {{ Form::open(array('url' => 'post/edit/'.$post->id, 'method' => 'get')) }}
    	{{ Form::submit('Edit this post') }}
  		{{ Form::close() }}  
    	{{ Form::open(array('url' => 'post/delete/'.$post->id)) }}
    	{{ Form::submit('Delete this post') }}
  		{{ Form::close() }}  
  	@endif
 
@stop