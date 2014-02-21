@extends('layout')

@section('content')
   {{ Form::open(array('url' => 'register')) }}
   <ul>
      <li>
    	{{ Form::label('first_name', 'Nome:') }}
    	{{ Form::text('first_name') }}
      </li>
      <li>
    	{{ Form::label('last_name', 'Cognome:') }}
    	{{ Form::text('last_name') }}
      </li>
      <li>
    	{{ Form::label('email', 'Email:') }}
    	{{ Form::text('email') }}
      </li>
      <li>
    	{{ Form::label('password', 'Password:') }}
    	{{ Form::password('password') }}
      </li>
      <li>
    	{{ Form::label('address', 'Indirizzo:') }}
    	{{ Form::text('address') }}
      </li>
      <li>
    	{{ Form::label('city', 'Citta:') }}
    	{{ Form::text('city') }}
      </li>
      <li>
    	{{ Form::label('province', 'Provincia:') }}
    	{{ Form::text('province') }}
      </li>
      <li>
    	{{ Form::label('gender', 'Genere:') }}
    	{{ Form::text('gender') }}
      </li>
    </ul>
    {{ Form::submit('Submit') }}
    {{ Form::close() }}  
@stop