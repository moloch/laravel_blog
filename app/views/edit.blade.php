@extends('layout')

@section('content')

<p>Logged in as {{{$email}}}</p>

  {{ Form::model($post, array('url' => 'post/edit/'.$post->id)) }}
  <ul>
  	<li>
  	  {{ Form::label('title', 'Title:') }}
  	  {{ Form::text('title') }}
  	</li>
  	<li>
  	  {{ Form::label('text', 'Text:') }}
  	  {{ Form::textarea('text') }}
  	</li>
  </ul>
  {{ Form::submit('Submit changes') }}
  {{ Form::close() }}  
 
@stop