@extends('app')

@section('contenido')
    <div class="row titulo">
        <h1><span class="fa fa-money"></span> Nuevo Gasto</h1>
    </div>

    <div class="row contenido">
        <div class="col-md-2 navegacion">
            <ul>
                <li><a href="#">Presupuestos</a></li>
                <li><a href="#">Gastos</a></li>
                {{-- <li><a href="#">Deudas</a></li>
                <li><a href="#">Config</a></li> --}}
            </ul>
        </div>
        <div class="col-md-3 informacion">
            <p>Presupuesto mensual: <strong>$$$</strong></p>
            <p>Gastado: <strong>$$$</strong></p>
            <p>Disponible: <strong>$$$</strong></p>
            <p>% Disponible: <strong>%%%</strong></p>
            <p>Se te debe: <strong>$$$</strong></p>
        </div>
        <div class="col-md-7 principal">
            {!! Form::open(['method' => 'POST', 'action' => 'GastosController@store']) !!}
                @include('gastos._form')
            {!! Form::close() !!}
        </div>
    </div>
@stop