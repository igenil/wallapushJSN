@extends('layouts.app')
@section('content')
<br>
<center><h1>{{$categoria->nombre}}</h1></center>
<br>
<div class="container">
    <center>
        <div class="container">
            <div class="grid-container">
                @foreach($anuncios as $anuncio)
                    <div class="card border-dark mb-3" style="width: 6cm;">
                        <h5 class="card-title bg-dark" style="color: white">{{$anuncio->producto}}</h5>
                        <img src="{{asset('../storage/app/public/anuncio/'. $anuncio->image[0]->img)}}" class="card-img-top" style="width:220px; height:235px">
                        <div class="card-body">
                            <h3 class="card-text">{{$anuncio->precio}} €</h3>
                            <div class="dropdown-divider"></div>
                            <p class="card-text" style="font-size: 13px">{{$anuncio->descripcion}}</p>
                            <div class="dropdown-divider"></div>
                            <a href='../showAnuncio/{{$anuncio->id}}'> 
                                <button type="button" class="btn btn-outline-primary"><i class="fas fa-cart-plus"></i></button>
                            </a>   
                        </div>
                        <div class="card-footer text-muted" style="font-size: 13px">
                            Subido por {{$anuncio->usuario->name}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <br>
    </center>
</div>
@endsection