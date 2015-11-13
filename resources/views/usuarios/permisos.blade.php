<div class="form-group well">
	<table class="table">
		<caption><h4><strong>
			<p>Asignación de Permisos de Usuario</p>
			<p>Usuario:{{ $user->nombre}}</p>
		</strong></h4></caption>
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
			@if(! $permisos->contains($modulo))
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
						<input type="checkbox" id="{{ $modulo->id }}_0" name="{{ $modulo->id }}_0" value="1" disabled>
						Crear
					</label>
					<label class="checkbox-inline" for="{{ $modulo->id }}_1">
						<input type="checkbox" id="{{ $modulo->id }}_1" name="{{ $modulo->id }}_1" value="1" disabled>
						Mostrar
					</label>
					<label class="checkbox-inline" for="{{ $modulo->id }}_2">
						<input type="checkbox" id="{{ $modulo->id }}_2" name="{{ $modulo->id }}_2" value="1" disabled>
						Editar
					</label>
					<label class="checkbox-inline" for="{{ $modulo->id }}_3">
						<input type="checkbox" id="{{ $modulo->id }}_3" name="{{ $modulo->id }}_3" value="1" disabled>
						Borrar
					</label>
					<label class="checkbox-inline" for="{{ $modulo->id }}_4">
						<input type="checkbox" id="{{ $modulo->id }}_4" name="{{ $modulo->id }}_4" value="1" disabled>
						Buscar
					</label>
				</td>
				<td>
					<label class="checkbox-inline" for="{{ $modulo->id }}_5">
						<input type="checkbox" id="{{ $modulo->id }}_5" name="{{ $modulo->id }}_5" value="1" disabled>
						Exportar Excel
					</label>
					<label class="checkbox-inline" for="{{ $modulo->id }}_6">
						<input type="checkbox" id="{{ $modulo->id }}_6" name="{{ $modulo->id }}_6" value="1" disabled>
						Exportar PDF
					</label>
					<label class="checkbox-inline" for="{{ $modulo->id }}_7">
						<input type="checkbox" id="{{ $modulo->id }}_7" name="{{ $modulo->id }}_7" value="1" disabled>
						Enviar correos
					</label>
					<label class="checkbox-inline" for="{{ $modulo->id }}_8">
						<input type="checkbox" id="{{ $modulo->id }}_8" name="{{ $modulo->id }}_8" value="1" disabled>
						Otro
					</label>
				</td>
			@else
				@foreach($permisos as $permiso)
				@if($modulo->id == $permiso->pivot->modulo_id)					
				<td>
					<label class="radio-inline" for="{{ $modulo->id }}si">
						<input type="radio" id="{{ $modulo->id }}si"            name="{{ $modulo->id }}" value="1" checked>
						Si
					</label>
					<label class="radio-inline" for="{{ $modulo->id }}no">
						<input type="radio" id="{{ $modulo->id }}no"            name="{{ $modulo->id }}" value="0">
						No
					</label>
				</td>
				<td>
					<label class="checkbox-inline" for="{{ $modulo->id }}_0">
						<input type="checkbox" id="{{ $modulo->id }}_0" name="{{ $modulo->id }}_0" value="1" 
						<?php if($permiso->pivot->c == 1) echo 'checked' ;?>>
						Crear
					</label>
					<label class="checkbox-inline" for="{{ $modulo->id }}_1">
						<input type="checkbox" id="{{ $modulo->id }}_1" name="{{ $modulo->id }}_1" value="1" 
						<?php if($permiso->pivot->r == 1) echo 'checked' ;?>>
						Mostrar
					</label>
					<label class="checkbox-inline" for="{{ $modulo->id }}_2">
						<input type="checkbox" id="{{ $modulo->id }}_2" name="{{ $modulo->id }}_2" value="1" 
						<?php if($permiso->pivot->u == 1) echo 'checked' ;?>>
						Editar
					</label>
					<label class="checkbox-inline" for="{{ $modulo->id }}_3">
						<input type="checkbox" id="{{ $modulo->id }}_3" name="{{ $modulo->id }}_3" value="1" 
						<?php if($permiso->pivot->d == 1) echo 'checked' ;?>>
						Borrar
					</label>
					<label class="checkbox-inline" for="{{ $modulo->id }}_4">
						<input type="checkbox" id="{{ $modulo->id }}_4" name="{{ $modulo->id }}_4" value="1" 
						<?php if($permiso->pivot->s == 1) echo 'checked' ;?>>
						Buscar
					</label>
				</td>
				<td>
					<label class="checkbox-inline" for="{{ $modulo->id }}_5">
						<input type="checkbox" id="{{ $modulo->id }}_5" name="{{ $modulo->id }}_5" value="1" 
						<?php if($permiso->pivot->excel == 1) echo 'checked' ;?>>
						Exportar Excel
					</label>
					<label class="checkbox-inline" for="{{ $modulo->id }}_6">
						<input type="checkbox" id="{{ $modulo->id }}_6" name="{{ $modulo->id }}_6" value="1" 
						<?php if($permiso->pivot->pdf == 1) echo 'checked' ;?>>
						Exportar PDF
					</label>
					<label class="checkbox-inline" for="{{ $modulo->id }}_7">
						<input type="checkbox" id="{{ $modulo->id }}_7" name="{{ $modulo->id }}_7" value="1" 
						<?php if($permiso->pivot->correos == 1) echo 'checked' ;?>>
						Enviar correos
					</label>
					<label class="checkbox-inline" for="{{ $modulo->id }}_8">
						<input type="checkbox" id="{{ $modulo->id }}_8" name="{{ $modulo->id }}_8" value="1" 
						<?php if($permiso->pivot->s4 == 1) echo 'checked' ;?>>
						Otro
					</label>
				</td>
				@PHPcode($permisos->shift())
				@break()
				@endif
				@endforeach
			@endif
			</tr>
		@endforeach
		</tbody>
	</table>
</div>