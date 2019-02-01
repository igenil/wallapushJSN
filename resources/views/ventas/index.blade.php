@extends('layouts.app')

@section('content')
    <div class="container">
        <br><br>
        <center><h1>LISTADO DE TUS VENTAS</h1></center>
        <br>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th><i class="fas fa-cart-arrow-down"></i></th>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ventas as $venta)
                        <tr>      
                            <td style="color: #5dea79;"><b>VENDIDO</b></td>
                            <td>{{$venta->producto}}</td>
                            <td>{{$venta->precio}} €</td>                
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection