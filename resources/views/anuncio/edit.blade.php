@extends('layouts.app')
@section('content')
<div style="width: 80%; text-align: left; margin: 0 auto;">
    <br>
    <h1 style="text-align: center">EDITAR ANUNCIO</h1>
    <br>
    @if (count($errors)>0)
        <center>
            <div class="alert alert-danger" role="alert" style="width:10cm;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        </center>
    @endif
    <center>
        <form method="POST" action="{{ route ('editarAnuncio', ['id'=> $anuncio->id]) }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="producto" class="control-label">
                    <b>PRODUCTO:</b>
                </label>
                <input id="producto" class="form-control col-md-3 " name="producto" value="{{ $anuncio->producto }}" />
            </div>
            <div class="form-group">
                    <label for="descripcion" class="control-label">
                        <b>DESCRIPCIÓN:</b>
                    </label>
                    <textarea class="form-control col-md-3" name="descripcion" rows="8">{{ $anuncio->descripcion }}</textarea>
            </div>
            <div class="form-group">
                    <label for="id_categoria"><b>CATEGORÍA:</b></label>
                    <select class="form-control col-md-3" name="id_categoria" required>
                        @foreach($categorias as $categoria)
                            <option value = "{{$categoria->id}}">{{$categoria->nombre}}</option>
                            {{-- <option value="{{$categoria->id}}">{{$categoria->nombre}}</option> --}}
                        @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label for="precio" class="col-md-8 control-label">
                    <b>PRECIO:</b>
                </label>
                <input type="number" class="form-control col-md-3" name="precio" value="{{$anuncio->precio }}" />
            </div>

            <div class="form-group">
                <label for="estado"><b>ESTADO:</b></label>
                <select class="form-control col-md-3" name="nuevo" required>
                    @if ($anuncio->nuevo==0)
                    <option value="0" selected></option>
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
                    <b>VENDIDO:</b>
                    <select class="form-control" name="vendido" style="width:10cm" value="{{$anuncio->nuevo }}" required>
                    @if ($anuncio->vendido==0)
                    <option value="0" selected></option>
                        <option value="0" selected>No</option>
                        <option value="1">Si</option>
                    @else
                        <option value="0" >No</option>
                        <option value="1" selected>Si</option>
                    @endif
                    </select>
                </label> 
            </div>
            <button type="submit" name="editanuncio" class="btn btn-success mb-2">
                {{ __("Editar Anuncio") }}
            </button>   
        </form>
    </center>
    <div style="text-align:center;">
    <a href="{{ url('/listAnuncios') }}">  
        <button type="button" class="btn btn-danger">Cancel</button>
    </a>
    <br><br>
</div>
@endsection