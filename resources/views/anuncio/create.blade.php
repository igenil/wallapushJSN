@extends('layouts.app')
@section('content')

@if (count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif
<div style="width: 80%; text-align: left; margin: 0 auto;">
    <form method="POST" action="{{url('/addanuncio')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="col-md-12 control-label">
                {{ __("Producto") }}
            </label>
            <input id="producto" class="form-control" name="producto" value="{{ old('producto') }}" />
        </div>
        <div class="form-group">
            <label for="categoria" class="col-md-12 control-label">
                {{ __("Categoria") }}
            </label>
            <input id="id_categoria" class="form-control" name="id_categoria" value="{{
        old('categoria') }}" />
        </div>
        <div class="form-group">
            <label for="precio" class="col-md-12 control-label">
                {{ __("Precio") }}
            </label>
            <input id="precio" class="form-control" name="precio" value="{{ old('precio') }}" />
        </div>
        <div class="form-group">
                <label for="estado" class="col-md-12 control-label">
                    {{ __("Estado") }}
                </label>
                <input id="estado" class="form-control" name="estado" value="{{ old('estado') }}" />
        </div>
        <div class="form-group">
                <label for="vendido" class="col-md-12 control-label">
                    {{ __("Vendido") }}
                </label>
                <input id="vendido" class="form-control" name="vendido" value="{{ old('vendido') }}" />
        </div>
        <div class="form-group">
                <label for="descripcion" class="col-md-12 control-label">
                    {{ __("Descripcion") }}
                </label>
                <input id="descripcion" class="form-control" name="descripcion" value="{{ old('descripcion') }}" />
        </div>
        <button type="submit" name="addanuncio" class="btn btn-success">
            {{ __("Añadir anuncio") }}
        </button>
        &nbsp;&nbsp;&nbsp;
        <a href="{{ url('/anuncio') }}">  
        <button type="button" class="btn btn-danger">Cancel</button>
         </a>
    </form>
    </div>
    </div>
</div>
@endsection