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
                <th scope="col">Categoria</th>
                <th scope="col">Precio</th>
                <th scope="col">Estado</th>
                <th scope="col">Descripcion</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="color: #5dea79;"><b>COMPRADO</b></td>
                    <td>{{$trans->anuncio->producto}}</td>
                    <td></td>
                    <td> €</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        {{$trans->links()}}
</div>
@endsection