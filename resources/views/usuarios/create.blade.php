@extends('layouts.master')

@section('header')
	Registro!
@endsection

@section('content')
	{!! Form::open(array('route' => 'usuarios.store', 'role' => 'form')) !!}
		@include('usuarios.form')
		<div class="form-group well">
			<table class="table">
				<caption><h4><strong>Asignación de Permisos de Usuario</strong></h4></caption>
				<thead>
					<tr>
						<th>Módulo</th>
						<th>Conceder Acceso</th>
						<th>CRUD</th>
						<th>Servicios</th>
					</tr>
				</thead>
				<tbody>
					@foreach($modulos as $modulo)
						<tr>
							<td>
								{{ $modulo->nombre }}
							</td>
							<td>
								<label class="radio-inline" for="{{ $modulo->id }}si">
									<input type="radio" id="{{ $modulo->id }}si" name="{{ $modulo->id }}" value="1">
									Si
								</label>
								
								<label class="radio-inline" for="{{ $modulo->id }}no">
									<input type="radio" id="{{ $modulo->id }}no" name="{{ $modulo->id }}" value="0" checked="checked">
									No
								</label>
							</td>
							<td>
								<label class="checkbox-inline" for="{{ $modulo->id }}_0">
									<input type="checkbox" id="{{ $modulo->id }}_0" name="{{ $modulo->id }}_0" value="1">
									Crear
								</label>
								
								<label class="checkbox-inline" for="{{ $modulo->id }}_1">
									<input type="checkbox" id="{{ $modulo->id }}_1" name="{{ $modulo->id }}_1" value="1">
									Mostrar
								</label>
								
								<label class="checkbox-inline" for="{{ $modulo->id }}_2">
									<input type="checkbox" id="{{ $modulo->id }}_2" name="{{ $modulo->id }}_2" value="1">
									Editar
								</label>
								
								<label class="checkbox-inline" for="{{ $modulo->id }}_3">
									<input type="checkbox" id="{{ $modulo->id }}_3" name="{{ $modulo->id }}_3" value="1">
									Borrar
								</label>
								
								<label class="checkbox-inline" for="{{ $modulo->id }}_4">
									<input type="checkbox" id="{{ $modulo->id }}_4" name="{{ $modulo->id }}_4" value="1">
									Buscar
								</label>
							</td>
							<td>
								<label class="checkbox-inline" for="{{ $modulo->id }}_5">
									<input type="checkbox" id="{{ $modulo->id }}_5" name="{{ $modulo->id }}_5" value="1">
									Exportar Excel
								</label>
								
								<label class="checkbox-inline" for="{{ $modulo->id }}_6">
									<input type="checkbox" id="{{ $modulo->id }}_6" name="{{ $modulo->id }}_6" value="1">
									Exportar PDF
								</label>
								
								<label class="checkbox-inline" for="{{ $modulo->id }}_7">
									<input type="checkbox" id="{{ $modulo->id }}_7" name="{{ $modulo->id }}_7" value="1">
									Enviar correos
								</label>
								
								<label class="checkbox-inline" for="{{ $modulo->id }}_8">
									<input type="checkbox" id="{{ $modulo->id }}_8" name="{{ $modulo->id }}_8" value="1">
									Otro
								</label>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		{!! Form::button('Registrar', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}
	{!! Form::close() !!}
@endsection