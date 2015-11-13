@extends('layouts.masterModal')
@section('content')
	{!! Form::model($user, array('route' => array('usuarios.update', $user), 'role' => 'form', 'method' => 'PUT')) !!}
		@include('usuarios.form')
		<p>
			{!! Form::button('Guardar', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}
		</p>
	{!! Form::close() !!}
	<p>
		{!! Form::button('Editar Permisos', array('type' => 'button', 'class' => 'btn btn-info btn-sm', 'data-toggle' => 'modal', 'data-target' => '.mi-modal-lg')) !!}
	</p>
@endsection
@section('modalContent')
	@include('usuarios.permisos')
@endsection
@section('text')
@include('alerts.message')
@endsection
@section('scripts')
<script>
	$(document).ready(function(){
		valCheck();
		showURL();
	});

	function valCheck(){
			var total = $('input:checkbox').length;
			var count = total / {{ $modulos->count() }};
			@foreach($modulos as $modulo)
				$('input[name={{ $modulo->id }}]').change(function(){
					for (var i = 0; i < count; i++) {
						if($(this).val() == '0'){
							$('#{{ $modulo->id }}_' + i + '').prop('disabled', true);
						}
						else{
							$('#{{ $modulo->id }}_' + i + '').prop('disabled', false);
						}
					}
				});
			@endforeach
		}

		function showURL(){
			$('#btnGuardar').click(function(){
				var u = '{{ $user->id }}';
				//var url = "{{ url('usuarios/"+ user +"') }}";
				var url='http://localhost:81/tuto-laravel/public/usuarios/'+u+''; 
				var token = $('#token').val();
				var datos= $('form').serialize();
				
				$.ajax({
					url: url,
					type: 'put',
					data: datos,
					dataType: 'json',
					headers: {'X-CSRF-TOKEN':token},

					success:function(msj){
					console.log(msj.msj);
					$('#modal').modal('hide');
					$('#msg').html(msj.msj);
					$('#msg').show('fast');
					setTimeout(function () {
                		$('#msg').hide('slow');
                		}, 3000);
					}
				});
			});
		}
</script>


@endsection