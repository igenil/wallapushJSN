@extends('layouts.app')
@section('content')
<div style="width: 80%; text-align: left; margin: 0 auto;">
    <form method="POST" action="{{$anuncio->id}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="producto" class="col-md-12 control-label">
                {{ __("Producto") }}
            </label>
            <input id="producto" class="form-control" name="producto" value="{{ $anuncio->producto }}" />
        </div>
        <div class="form-group">
            <label for="categoria" class="col-md-12 control-label">
                {{ __("Categoria") }}
            </label>
            <input id="categoria" class="form-control" name="categoria" value="{{$anuncio->categoria->nombre }}" />
        </div>
        <div class="form-group">
            <label for="precio" class="col-md-12 control-label">
                {{ __("Precio") }}
            </label>
            <input id="precio" class="form-control" name="precio" value="{{$anuncio->precio }}" />
        </div>
        <div class="form-group">
            <label for="estado" class="col-md-12 control-label">
                {{ __("Estado") }}
            </label>
            <input id="estado" class="form-control" name="estado" value="{{$anuncio->estado }}" />
        </div>
        <div class="form-group">
            <label for="nuevo" class="col-md-12 control-label">
                {{ __("Nuevo") }}
            </label>
            <input id="nuevo" class="form-control" name="nuevo" value="{{$anuncio->nuevo }}" />
        </div>
    <table>
        <button type="submit" name="editanuncio" class="btn btn-success">
            {{ __("Editar Anuncio") }}
        </button>   
    </form>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ url('/anuncio') }}">  
        <button type="button" class="btn btn-danger">Cancel</button>
    </a>
    </table>
</div>
</div>
</div>
@endsection