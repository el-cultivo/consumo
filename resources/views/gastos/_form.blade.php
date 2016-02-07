<div class="form-group">
	{!! Form::text ('nombre', null , ['class' => 'form-control', 'required', 'placeholder' => 'Nombre']) !!}
</div>
<div class="form-group">
	<div class="input-group">
		<div class="input-group-addon">$</div>
		{!! Form::number ('cantidad', null , ['class' => 'form-control', 'placeholder' => 'Cantidad', 'required']) !!}
	</div>
</div>
<div class="row">
	<div class="form-group col-md-6">
		{!! Form::label('created_at', 'Cuándo')!!}
		{!! Form::date ('created_at', Carbon\Carbon::now() , ['class' => 'form-control', 'required']) !!}
	</div>
	<div class="form-group col-md-6">
		{!! Form::label('user_id', 'Quién')!!}
		{!! Form::select('user_id', $usuarios, Auth::user()->id, ['class' => 'form-control']) !!}
	</div>
</div>
<div class="row">
	<div class="form-group col-md-6">
		<label>Tipo de pago</label>
		{!! Form::select('tipo_pago', ['Efectivo'=>'Efectivo', 'Crédito'=>'Crédito'], 'Efectivo', ['class' => 'form-control']) !!}
	</div>
	<div class="form-group col-md-6">
		<label>Prestamo</label>
		{!! Form::select('prestamo', App\Gasto::$tipos_prestamos, 'Ninguno', ['class' => 'form-control']) !!}
	</div>
</div>
<div class="row">
	<div class="form-group col-md-6">
		<label>Prestamos a usuario</label>
		{!! Form::select('prestamo_user_id', $usuarios_disponibles_prestamo, 'Efectivo', ['class' => 'form-control', $usuarios_prestamo_disabled]) !!}
	</div>
</div>


<div class="form-group">
	<p>{!! Form::submit('Guardar', ['class' => 'btn btn-primary'] ) !!}</p>
</div>