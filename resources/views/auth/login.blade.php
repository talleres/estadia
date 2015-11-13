<!DOCTYPE html>
<html lang="en">
  <head>
  	{!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/estilos.css') !!}
  </head>

  <body>
    {!! Form::open(array('route' => 'auth.store', 'class' => 'form-signin')) !!}

      <div class="form-group">
        {!! Form::label('usuario', 'Nombre de usuario') !!}
        {!! Form::text('usuario', Input::old('usuario'), array('class' => 'form-control', 'placeholder' => 'Nombre de Usuario', 'autofocus' => 'autofocus')) !!}
          @if($errors->has('usuario'))
            @foreach($errors->get('usuario') as $error)
              <div class="alert alert-danger" role="alert">{{ $error }}</div>
            @endforeach
          @endif
      </div>

      <div class="form-group">
        {!! Form::label('password', 'Contraseña') !!}
        {!! Form::password('password', array('class' => 'form-control', 'placeholder' => '*********')) !!}
          @if($errors->has('password'))
            @foreach($errors->get('password') as $error)
              <div class="alert alert-danger" role="alert">{{ $error }}</div>
            @endforeach
          @endif
      </div>

      <div class="form-group">
        {!! Form::label('remember', 'Recordar Contraseña') !!}                    
        {!! Form::checkbox('remember', true) !!}
      </div>
      
      {!! Form::button('Iniciar sesión', array('type' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block')) !!}

      @include('alerts.error')

    {!! Form::close() !!}

    {!! Html::script('js/jquery-2.1.4.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
  </body>
</html>