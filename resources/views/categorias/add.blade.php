@extends('layouts.app')
@section('content')
<center>
    <div class="alert alert-secondary" role="alert">
        <form method="POST" action="{{url('addCategoriaForm/')}}">
            {{ csrf_field() }}
            <table>
                <tr>
                    <td>
                        <p>Nombre:</p>
                        <input name="nombre"  type="text" class="form-control" >
                        <br>
                    </td>
                </tr>
            </table>
            <br>
            <br>
            <button type="submit" name="addcategoria" class="btn btn-success">{{ __("Añadir") }}</button> &nbsp;           
            <a href="{{ url('listCategorias/') }}" class="btn btn-danger">Cancelar</a> &nbsp;
    </form>
        <br>  
    </div>
</center>
@endsection