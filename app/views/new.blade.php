@extends('layout')

@section('content')

<p>Logged in as {{{$email}}}</p>

  {{ Form::open(array('url' => 'post/new')) }}
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
  {{ Form::submit('Create post') }}
  {{ Form::close() }}  
 
@stop