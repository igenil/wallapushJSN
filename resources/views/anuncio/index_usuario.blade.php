@extends('layouts.app')
@section('content')
<br>
<center><h1>ANUNCIOS</h1></center>
<br>
<div class="container">
    <center>
        @if(\Session::has('success'))
        <center><div class="alert-danger" style="width:30%;"> <center>{!! \Session::get('success') !!} </center></div></center>
        <br>
        @endif
        <div class="container">
            <div class="grid-container">
            @foreach($anuncios as $anuncio)
                <div class="card border-dark mb-3" style="width: 6cm;">
                    <h5 class="card-title bg-dark" style="color: white">{{$anuncio->producto}}</h5>
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="card-text">{{$anuncio->precio}} €</h3>
                        <div class="dropdown-divider"></div>
                        <p class="card-text" style="font-size: 13px">{{$anuncio->descripcion}}</p>
                        <div class="dropdown-divider"></div>
                        <a href='showAnuncio/{{$anuncio->id}}'> 
                            <button type="button" class="btn btn-outline-primary"><i class="fas fa-cart-plus"></i></button>
                        </a>   
                    </div>
                    <div class="card-footer text-muted" style="font-size: 13px">
                        Subido por {{$anuncio->usuario->name}}
                    </div>
                </div>
            @endforeach
            
            <br>
            </div>
        </div>
        {{$anuncios->links()}}
    </center>
</div>
@endsection