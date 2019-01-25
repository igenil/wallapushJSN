@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <h3 style="text-align: center">CATEGORIAS</h3>
    <div style="text-align: center; width:80%;">
        <br>
        
            <div class="container">
                <div class="grid-container">
                    @foreach($categorias as $categoria)
                        <a style="text-decoration:none; color:black" href="anunciosCategoria/{{$categoria->id}}">
                        <div class="row">
                            <div class="card card2">
                                <div class="card-body">
                                <p class="card-text">{{$categoria->nombre}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        
    </div>
</div>

@endsection
