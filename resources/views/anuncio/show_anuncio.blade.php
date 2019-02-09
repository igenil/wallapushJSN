@extends('layouts.app')
@section('content')
<br><br>
<div class="container">
    <center>
        <br>
        @if(\Session::has('success'))
            <center><div class="alert alert-danger" style="width:30%;"> <center>{!! \Session::get('success') !!} </center></div></center>
            <br>
        @endif
        <br>
        <div class="card text-center" style="width: 25cm;">
            <div class="card-header">
                <h6>{{$anuncio->usuario->name}}</h6><h4>{{$anuncio->producto}}</h4>
            </div>

                <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-interval="2000">
                            <img src="{{asset('../storage/app/public/anuncio/'. $anuncio->image[0]->img)}}" style="width:250px; heigth:300px" alt="...">
                        </div>
                        @foreach($anuncio->image as $ima)
                        @if($ima->img != $anuncio->image[0]->img)
                            <div class="carousel-item " data-interval="2000">
                                <img src="{{asset('../storage/app/public/anuncio/'. $ima->img)}}" style="width:250px; heigth:300px" alt="...">
                            </div>
                        @endif
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>            
            <h3 class="card-title" style="color: #42f4d1">{{$anuncio->precio}} €</h3>
            <div class="dropdown-divider"></div>
            <p class="card-text">{{$anuncio->descripcion}}</p>
            <div class="dropdown-divider"></div>
            <a href="{{route('comprar', ['id_anuncio'=> $anuncio->id,'id_comprador'=> Auth::user()->id, 'id_venderdor' => $anuncio->usuario->id])}}" class="btn btn-outline-success"> Comprar</a>
        </div>
        <div class="card-footer text-muted">
            2 days ago
        </div>
</div>
    </center>

@endsection