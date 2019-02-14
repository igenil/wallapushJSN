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
                            <p class="card-text" style="font-size: 13px">Categoria: {{$anuncio->categoria->nombre}}</p>
                            <div class="dropdown-divider"></div>
                            <a href='../showAnuncio/{{$anuncio->id}}'> 
                                <button type="button" class="btn btn-outline-primary mb-2"><i class="fas fa-cart-plus"></i></button>
                            </a>  
                            @if($anuncio->vendido==0 && $anuncio->id_vendedor == auth()->user()->id) 
                                <div class="card-footer" style="text-align: center">
                                    <form action="{{ route ('deleteAnuncio', ['id'=> $anuncio->id]) }}" method="post">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <a class = "btn btn-primary" href="{{ route ('indexEditAnuncioUser', ['id'=> $anuncio->id]) }}">
                                            <span class="fas fa-pencil-alt" ></span>
                                        </a>
                                            <button class="btn btn-danger" type="submit"><span class="fas fa-trash-alt" ></span></button>
                                    </form>
                                </div>
                            @endif                            
                        </div>
                        <div class="card-footer text-muted" style="font-size: 13px">
                            Subido por: {{$anuncio->usuario->name}}<br>
                            Localidad: {{$anuncio->usuario->localidad}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <br>
    </center>
</div>
@endsection