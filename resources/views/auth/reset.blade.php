@extends('app')

@section('title')
    Nueva contraseña
@stop

@section('h1')
    Nueva contraseña
@stop


@section('sidebar')
@stop


@section('principal')
	<form method="POST" action="/auth/register">
	    {!! csrf_field() !!}

	    <div>
	        Email
	        <input type="email" name="email" value="{{ old('email') }}">
	    </div>

	    <div>
	        Password
	        <input type="password" name="password">
	    </div>

	    <div>
	        Confirm Password
	        <input type="password" name="password_confirmation">
	    </div>

	    <div>
	        <button type="submit">
	            Reset Password
	        </button>
	    </div>
	</form>
@stop