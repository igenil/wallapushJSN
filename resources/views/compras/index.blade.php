@extends('layouts.app')

@section('content')
<div class="container">
    <br><br>
    <center><h1>LISTADO DE TUS COMPRAS</h1></center>
    <br>
        <table class="table">
            <thead class="thead-light">
                <tr>
                <th><i class="fas fa-cart-arrow-down"></i></th>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trans as $tran)
                    <tr>      
                        <td style="color: #5dea79;"><b>COMPRADO</b></td>
                        <td>{{$tran->anuncio->producto}}</td>
                        <td>{{$tran->anuncio->precio}}</td> 
                        <td>{{$tran->anuncio->descripcion}}</td>                     
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection