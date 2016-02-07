@extends('app')

@section('title')
    Nuevo Gasto
@stop

@section('h1')
    Gastos {{$fecha->format("M y")}}
@stop


@section('sidebar')
    @include('_menu')
    <div class="col-md-3 informacion">
        <p>Presupuesto mensual: <strong>$$$</strong></p>
        <p>Gastado: <strong>$ {{$total}}</strong></p>
        <p>Disponible: <strong>$$$</strong></p>
        <p>% Disponible: <strong>%%%</strong></p>
        <p>Se te debe: <strong>$$$</strong></p>
    </div>
@stop


@section('principal')
    <div class="col-md-7 principal">
        <div class="table-responsive">
		  <table class="table">
		  	<thead> <tr> <th>Día</th> <th>Nombre</th> <th>$$$</th> <th>Pago</th> </tr> </thead>
		  	<tbody>
		  		@foreach($gastos as $gasto)
		  			<tr @if($gasto->prestamo_user_id) class="active" @endif>
		  			<td>{{$gasto->created_at->format("d H:i")}}</th> <td>{{$gasto->nombre}}</td> <td>$ {{$gasto->cantidad}}</td> <td>{{$gasto->tipo_pago}}</td> </tr>
		  		@endforeach
		  	</tbody>
		  </table>
		</div>
    </div>
@stop