@extends('layouts.app')
@section('content')
<br>
<br>
<table class="table table-striped table-hover" style="width: 80%; text-align: left; margin: 0 auto;">
        <thead style="background-color: #b9cced;">
            <tr>
              <td>Producto</td>
              <td>Categoria</td>
              <td>Precio</td>
              <td>Estado</td>
              <td>Vendido</td>
              <td>Descripcion</td>
              <td>
              <td>
            </tr>
        </thead>
        <tbody>
            @foreach($anuncios as $anuncio)
            <tr>
                <td>{{$anuncio->producto}}</td>
                <td>{{$anuncio->categoria->nombre}}</td>
                <td>{{$anuncio->precio}}</td>
                <td>{{$anuncio->estado}}</td>
                <td>{{$anuncio->vendido}}</td>
                <td>{{$anuncio->descripcion}}</td>
                <td style="width:1%;">
                    <a href="editanuncio/{{$anuncio->id}}">
                        <button class = "btn btn-primary"><span class="fas fa-pencil-alt" ></span></button>
                    </a>
                </td>
                <td style="width:1%;">
                <form action="anuncio/{{$anuncio->id}}" method="post">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                    <button class="btn btn-danger" type="submit"><span class="fas fa-trash-alt" ></span></button>
                </form>
                </td>
                </td>
            </tr>
            @endforeach   
            <td><a href="{{ url('/addanuncio') }}">
                    <button type="submit" class="btn btn-success">Crear Anuncio</button></td>
                </a>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tbody>
    </table>
    
<div>
@endsection