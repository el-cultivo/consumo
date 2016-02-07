@extends('app')

@section('title')
    Nuevo Gasto
@stop

@section('h1')
    Nuevo Gasto
@stop


@section('informacion')
    <div class="col-md-3 informacion">
        <p>Presupuesto mensual: <strong>$$$</strong></p>
        <p>Gastado: <strong>$$$</strong></p>
        <p>Disponible: <strong>$$$</strong></p>
        <p>% Disponible: <strong>%%%</strong></p>
        <p>Se te debe: <strong>$$$</strong></p>
    </div>
@stop


@section('principal')
    <div class="col-md-7 principal">
        {!! Form::open(['method' => 'POST', 'action' => 'GastosController@store']) !!}
            @include('gastos._form')
        {!! Form::close() !!}
    </div>
@stop