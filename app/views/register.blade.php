@extends('layout')

@section('content')
   {{ Form::open(array('action' => 'RegistrationController@submitRegistrationForm')) }}
   			$table -> string('email') -> unique();
			$table -> string('password');
			$table -> string('last_name','30');
			$table -> string('first_name','30');
			$table -> text('address');
			$table -> text('city');
			$table -> string('province','2');
			$table -> string('gender','1');
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
    	{{ Form::label('first_name', 'Email:') }}
    	{{ Form::text('first_name') }}
      </li>
      <li>
    	{{ Form::label('first_name', 'Email:') }}
    	{{ Form::text('first_name') }}
      </li>
      <li>
    	{{ Form::label('first_name', 'Email:') }}
    	{{ Form::text('first_name') }}
      </li>
      <li>
    	{{ Form::label('first_name', 'Email:') }}
    	{{ Form::text('first_name') }}
      </li>
      <li>
    	{{ Form::label('first_name', 'Email:') }}
    	{{ Form::text('first_name') }}
      </li>
      <li>
    	{{ Form::label('first_name', 'Email:') }}
    	{{ Form::text('first_name') }}
      </li>
    </ul>
    {{ Form::submit('Submit') }}
    {{ Form::close() }}  
@stop