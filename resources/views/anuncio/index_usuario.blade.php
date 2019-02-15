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
                <div class="card border-dark mb-3" style="width:250px !important; heigth:300px !important;">
                    <h5 class="card-title bg-dark" style="color: white">{{$anuncio->producto}}</h5>
                    <img src="{{asset('../storage/app/public/anuncio/'. $anuncio->image[0]->img)}}" class="card-img-top"  style="width:220px; height:235px">
                    <div class="card-body">
                        <h3 class="card-text">{{$anuncio->precio}} €</h3>
                        <div class="dropdown-divider"></div>
                        <p class="card-text" style="font-size: 13px">Categoria: {{$anuncio->categoria->nombre}}</p>
                        <div class="dropdown-divider"></div>
                        <a href='showAnuncio/{{$anuncio->id}}'> 
                            <button type="button" class="btn btn-outline-primary mb-1"><i class="fas fa-cart-plus"></i></button>
                        </a> 
                        @if($anuncio->vendido==0 && $anuncio->id_vendedor == auth()->user()->id) 
                            <div  style="text-align: center">
                                <form action="{{ route ('deleteAnuncio', ['id'=> $anuncio->id]) }}" method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                    @if (Auth::user()->role == 'user')
                                        <a class = "btn btn-primary" href="{{ route ('indexEditAnuncioUser', ['id'=> $anuncio->id]) }}">
                                            <span class="fas fa-pencil-alt" ></span>
                                        </a>
                                    @endif
                                    @if (Auth::user()->role == 'admin')
                                        <a class = "btn btn-primary" href="{{ route ('indexEditAnuncio', ['id'=> $anuncio->id]) }}">
                                            <span class="fas fa-pencil-alt" ></span>
                                        </a>
                                    @endif
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
            <br>
            </div>
        </div>
        {{$anuncios->links()}}
    </center>
</div>
@endsection