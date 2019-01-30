@extends('layouts.app')
@section('content')
<br><br>
<div class="container">
    <center>
        <div class="card text-center" style="width: 25cm;">
            <div class="card-header">
                <h6>{{$anuncio->usuario->name}}</h6><h4>{{$anuncio->producto}}</h4>
            </div>
            <div class="card-body">
                <h3 class="card-title" style="color: #42f4d1">{{$anuncio->precio}} €</h3>
                <div class="dropdown-divider"></div>
                <p class="card-text">{{$anuncio->descripcion}}</p>
                <div class="dropdown-divider"></div>
                <a href="#" class="btn btn-outline-warning"><i class="far fa-star"></i> Valorar</a>
            </div>
            <div class="card-footer text-muted">
                2 days ago
            </div>
        </div>
    </center>
</div>
@endsection