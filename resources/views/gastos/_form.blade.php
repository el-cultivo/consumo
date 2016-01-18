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
		{!! Form::label('user_id', 'Cuándo')!!}
		{!! Form::date ('created_at', Carbon\Carbon::now() , ['class' => 'form-control', 'required']) !!}
	</div>
	<div class="form-group col-md-6">
		{!! Form::label('user_id', 'Quién')!!}
		{!! Form::select('user_id', $usuarios, '1', ['class' => 'form-control']) !!}
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<label>Tipo de pago</label>
		<div class="radio">
			<label>
				{!! Form::radio('tipo_pago', 'Efectivo', true); !!} Efectivo
			</label>
		</div>
		<div class="radio">
			<label>
				{!! Form::radio('tipo_pago', 'Crédito'); !!} Crédito
			</label>
		</div>
	</div>
	<div class="col-md-6">
		<label>Prestamo</label>
		<div class="radio">
			<label>
				{!! Form::radio('prestamo', 'ninguno', true); !!} Ninguno
			</label>
		</div>
		<div class="radio">
			<label>
				{!! Form::radio('prestamo', 'compartido'); !!} Gasto Compartido
			</label>
		</div>
		<div class="radio">
			<label>
				{!! Form::radio('prestamo', 'prestamo'); !!} Préstamo
			</label>
		</div>
	</div>
</div>


<div class="form-group">
{!! Form::submit('Guardar', ['class' => 'btn btn-primary'] ) !!}
</div>