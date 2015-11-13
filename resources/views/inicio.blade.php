<!--<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
        </div>
    </body>
</html>-->

@extends('layouts.master')

@section('header')

    @include('alerts.error')

@endsection

@section('content')

<!--<div class="row">

    @foreach($modulos as $modulo)
  
        <div class="col-xs-6 col-md-2">
            <a class="thumbnail" href="{{strtolower($modulo->nombre) }}" title="{{ $modulo->nombre }}">
                <img src="img/{{ $modulo->nombre }}.png" alt="{{ $modulo->nombre }}">
                <center><h4>{{ $modulo->nombre }}</h4></center>
            </a>
        </div>

    @endforeach

</div>-->


<div class="row">
    @foreach($modulos as $modulo)
        <div class="col-xs-4 col-md-3">
            <div class="thumbnail">
                <a href="{{strtolower($modulo->nombre) }}" title="{{ $modulo->nombre }}">
                    <img src="img/{{ $modulo->nombre }}.png" alt="{{ $modulo->nombre }}">
                    <center><h3>{{ $modulo->nombre }}</h3></center>
                </a>
            </div>
        </div>
    @endforeach
</div>

@endsection
