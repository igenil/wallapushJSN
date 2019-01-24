@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <h3 style="text-align: center">CATEGORIAS</h3>
    <div style="text-align: center; ">
        <br>
        <center>
        @foreach($categorias as $categoria)
            <div class="row">
                <div class="card">
                    <div class="card-body">
                    <p class="card-text">{{$categoria->nombre}}</p>
                    </div>
                </div>
            </div>
            
        @endforeach
        </center>
    </div>
</div>
@endsection
