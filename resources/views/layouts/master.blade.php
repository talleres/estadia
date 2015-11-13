<!DOCTYPE html>
<html>

<head>
  {!! Html::style('css/bootstrap.min.css') !!}
  @yield('css')
</head>

<body>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">SisHotel</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Hotel</a>
       </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          @if (Auth::check())  
          <li><a href="{{ url('inicio') }}">Modulos</a></li>
          @endif
        </ul>
           <ul class="nav navbar-nav navbar-right">
             <li ><a >Hola {{ Auth::user()->nombre }} ! </a></li>
            <li><a href="{{ route('logout') }}">Cerrar sesión</a><li>
           <ul>
     </div>/<!--.nav-collapse-->
    </nav>

    <div class="page-header">
      <h1 class="col-sm-offset-2">
        <small>@yield('header')</small>           
      </h1>
    </div>
    
    <div class="container">
      <div class="jumbotron">
        	@yield('content')
      </div>
      <div class="page-header">
        <div class="text-center">
                    
        </div>
      </div>
    </div>

    {!! Html::script('js/jquery-2.1.4.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
    @yield('scripts')
</body>

</html>