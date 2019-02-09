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
        <!--BUSCADOR-->
        <form class="form-inline my-2 my-lg-0" style="float:right" role="search" action="{{ url ('/filtroAnuncio') }}">
            <div class="form-group">   
                <input class="form-control mr-sm-2" name="producto" placeholder="Buscar..." aria-label="Search" style="width: 7cm"> 
                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>                
            </div>
        </form>
        <br><br><br>
        <div class="container">
            <div class="grid-container">
            @foreach($anuncios as $anuncio)
                <div class="card border-dark mb-3" style="width:250px; heigth:300px">
                    <h5 class="card-title bg-dark" style="color: white">{{$anuncio->producto}}</h5>
                    <img src="{{asset('../storage/app/public/anuncio/'. $anuncio->image[0]->img)}}" class="card-img-top" style="width:250px; heigth:300px">
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