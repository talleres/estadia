@extends('layouts.master')
@section('content')
	<table class="table table-hover">
	<p>
		@can('canPDF', 'Usuarios')
			{!! link_to_route('pdfAllUsers', $title='Generar PDF', $parameters=null, $attributes=array('class' => 'btn btn-info', 'role' => 'button', 'target' => '_blank')) !!}
		@endcan
		@can('canExcel', 'Usuarios')
			{!! link_to_route('excelAllUsers', $title='Generar Excel', $parameters=null, $attributes=array('class' => 'btn btn-info', 'role' => 'button', 'target' => '_blank')) !!}
		@endcan
	</p>
	<caption><h3><strong>Lista de Usuarios</strong></h3></caption>
	<thead>
		<tr>
			<th>NOMBRE</th>
			<th>USUARIO</th>
			<th>EMAIL</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($usuarios as $usuario)
		<tr>
			<td>{{ $usuario->nombre }}</td>
			<td>{{ $usuario->usuario }}</td>
			<td>{{ $usuario->email }}</td>
			<td>
			@if($edit)
				<td>
					{!! link_to_route('usuarios.edit', $title='Editar', $parameters=$usuario, $attributes=array('class' => 'btn btn-warning btn-sm', 'role' => 'button')) !!}
				</td>
			@endif
			@if($delete)
				<td>
					{!! Form::open(array('method' => 'DELETE', 'route' => array('usuarios.destroy', $usuario))) !!}
						{!! Form::button('Borrar', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm')) !!}
					{!! Form::close() !!}
				</td>
			@endif
		</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
