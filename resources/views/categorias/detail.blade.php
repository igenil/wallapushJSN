@extends('layouts.app')

@section('content')

<div class="container">
    <h3 style="text-align: center">LISTA DE CATEGORIAS</h3>
    
    <div style="text-align: center; ">
        <br>
            <a class="btn btn-primary" href="addCategoria/"> Añadir </a>
        <br/>
        <table class="table">
            <thead>
            <tr>
                <td><strong>NOMBRE</strong></td>
                <td><strong>ACCIÓN</strong></td>
            </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>
                    <td>{{$categoria->nombre}}</td>
                    <td>
                        <a class="btn btn-info" href="editCategoria/{{$categoria->id}}">
                            Editar 
                        </a>
                    </td>
                    <td>
                        <form action="deleteCategoria/{{$categoria->id}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de eliminar la categoría?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection