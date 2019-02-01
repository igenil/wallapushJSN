@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <h3 style="text-align: center">RANKING DE VENTAS</h3>
    
    <div style="text-align: center; ">
        <br>
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" > Añadir </button>
        <br/>
        <br>
        <center>
        <table style="width:50%; float:center;" class="table">
            <thead>
            <tr>
                <td><strong>ANUNCIO</strong></td>
                <td><strong>COMPRADOR</strong></td>
                <td></td>
            </tr>
            </thead>
            <tbody>
                @foreach($ventas as $venta)
                <tr>
                    <td>{{$venta->anuncio->producto}}</td>
                    <td>{{$venta->usuario->name}}</td>              
                </tr>
                @endforeach
            </tbody>
        </table>
        </center>
    </div>
</div>
@endsection
