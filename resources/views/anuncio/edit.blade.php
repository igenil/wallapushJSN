@extends('layouts.app')
@section('content')
<div style="width: 80%; text-align: left; margin: 0 auto;">
    <br>
    <br>
<form method="POST" action="{{ route('editarAnuncio', ['id'=> $anuncio->id]) }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="producto" class="col-md-8 control-label">
                {{ __("Producto") }}
            </label>
            <input id="producto" class="form-control col-md-3 " name="producto" value="{{ $anuncio->producto }}" />
        </div>
        <div class="form-group">
            <label for="categoria" class="col-md-8 control-label">
                {{ __("Categoria") }}
            </label>
            <input id="categoria" class="form-control  col-md-3" name="id_categoria" value="{{$anuncio->categoria->nombre }}" />
        </div>
        <div class="form-group">
            <label for="precio" class="col-md-8 control-label">
                {{ __("Precio") }}
            </label>
            <input id="precio" class="form-control  col-md-3" name="precio" value="{{$anuncio->precio }}" />
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-control" name="nuevo" style="width:200px" required>
                @if ($anuncio->nuevo==0)
                <option value="0" selected>...</option>
                    <option value="0" selected>Nuevo</option>
                    <option value="1">Seminuevo</option>
                @else
                    <option value="0" >Nuevo</option>
                    <option value="1" selected>Seminuevo</option>
                @endif
            </select>
        </div>

        <div class="form-group">
            <label for="vendido" >
                    {{ __("Vendido") }}
                <select class="form-control " name="vendido" style="width:200px" value="{{$anuncio->nuevo }}" required>
                        <option value="0">No</option>
                        <option value="1">Si</option>
                </select>
            </label> 
        </div>
    <table>
        <button type="submit" name="editanuncio" class="btn btn-success">
            {{ __("Editar Anuncio") }}
        </button>   
    </form>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ url('/listAnuncios') }}">  
        <button type="button" class="btn btn-danger">Cancel</button>
    </a>
    </table>
</div>

@endsection