@extends('app')

@section('title')
    ¿Olvidaste tu contraseña?
@stop

@section('h1')
    ¿Olvidaste tu contraseña?
@stop


@section('sidebar')
@stop


@section('principal')
	<form method="POST" action="/password/email">
	    {!! csrf_field() !!}

	    <div>
	        Email
	        <input type="email" name="email" value="{{ old('email') }}">
	    </div>

	    <div>
	        <button type="submit">
	            Send Password Reset Link
	        </button>
	    </div>
	</form>
@stop