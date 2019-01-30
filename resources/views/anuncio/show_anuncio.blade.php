@extends('layouts.app')
@section('content')
<br><br>
<div class="container">
    <center>
        <br>
        @if(\Session::has('success'))
        <center><div class="alert-danger" style="width:30%;"> <center>{!! \Session::get('success') !!} </center></div></center>
        <br>
        @endif
        <br>
        <div class="card text-center" style="width: 25cm;">
            <div class="card-header">
                <h6>{{$anuncio->usuario->name}}</h6><h4>{{$anuncio->producto}}</h4>
            </div>
            <div class="card-body">
                <h3 class="card-title" style="color: #42f4d1">{{$anuncio->precio}} €</h3>
                <div class="dropdown-divider"></div>
                <p class="card-text">{{$anuncio->descripcion}}</p>
                <div class="dropdown-divider"></div>
                <a href="{{route('comprar', ['id_anuncio'=> $anuncio->id,'id_comprador'=> Auth::user()->id, 'id_venderdor' => $anuncio->usuario->id])}}" class="btn btn-outline-success"> Comprar</a>
                <a href="#" class="btn btn-outline-warning"><i class="far fa-star"></i> Valorar</a>
            </div>
            <div class="card-footer text-muted">
                2 days ago
            </div>
        </div>
    </center>
</div>
@endsection