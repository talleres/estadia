<div class="form-group">
	{!! Form::label('nombre', 'Nombre:') !!}
	{!! Form::text('nombre', null, array('class' => 'form-control')) !!}
	@if($errors->has('nombre'))
        @foreach($errors->get('nombre') as $error)
        	<div class="alert alert-danger" role="alert">{{ $error }}</div>
        @endforeach
    @endif
</div>
<div class="form-group">
	{!! Form::label('usuario', 'Nombre de usuario:') !!}
	{!! Form::text('usuario', null, array('class' => 'form-control')) !!}
	@if($errors->has('usuario'))
        @foreach($errors->get('usuario') as $error)
        	<div class="alert alert-danger" role="alert">{{ $error }}</div>
        @endforeach
    @endif
</div>
<div class="form-group">
	{!! Form::label('email', 'Correo electrónico:') !!}
	{!! Form::text('email', null, array('class' => 'form-control')) !!}
	@if($errors->has('email'))
        @foreach($errors->get('email') as $error)
        	<div class="alert alert-danger" role="alert">{{ $error }}</div>
        @endforeach
    @endif
</div>
<div class="form-group">
	{!! Form::label('password', 'Contraseña:') !!}
	{!! Form::password('password', array('class' => 'form-control')) !!}
	@if($errors->has('password'))
        @foreach($errors->get('password') as $error)
        	<div class="alert alert-danger" role="alert">{{ $error }}</div>
        @endforeach
     @endif
</div>