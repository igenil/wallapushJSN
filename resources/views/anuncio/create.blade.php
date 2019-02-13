@extends('layouts.app')
@section('content')
<html>
      <head>
            <style>
          .thumb {
            height: 300px;
            border: 1px solid #000;
            margin: 10px 5px 0 0;
          }
        </style>
    </head>
    <body>
    <div class="container">
        <br>
        <center><h1>CREAR UN ANUNCIO</h1></center>
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
        <div style="width: 80%; text-align: left; margin: 0 auto;">
            <center>
            <form method="POST" action="{{url('/addanuncio1')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <label for="name" class="control-label">
                        <b>PPRODUCTO:</b>
                    </label>
                    <input id="producto" class="form-control" name="producto" style="width:600px" value="{{ old('producto') }}" />
                </div>
                <div class="form-group">
                    <label for="id_categoria"><b>CATEGORÍA:</b></label>
                    <select class="form-control" name="id_categoria" style="width: 600px" required>
                    <option></option>
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="precio" class="col-md-8 control-label">
                        <b>PRECIO:</b>
                    </label>
                    <input id="precio" class="form-control" name="precio" style="width:600px" value="{{ old('precio') }}" />
                </div>
                <div class="form-group">
                    <label for="nuevo"><b>ESTADO:</b></label>
                    <select class="form-control" name="nuevo" style="width:600px" required>
                        <option></option>
                        <option value="0">Nuevo</option>
                        <option value="1">Seminuevo</option>
                    </select>
                </div>
                <div class="form-group">
                        <label for="descripcion" class="col-md-8 control-label" >
                            <b>DESCRIPCIÓN:</b>
                        </label>
                        <textarea class="form-control col-md-8" name="descripcion" rows="8" value="{{ old('descripcion') }}"></textarea>
                </div>
                <div class="form-group">
                    <input name="uploadedfile[]" id="files" multiple type="file" />
                    <br>
                    
                </div>
                <button type="submit" name="addanuncio" class="btn btn-success">
                    {{ __("Añadir") }}
                </button>
                &nbsp;&nbsp;&nbsp;
                <a href="{{ url('/anuncios') }}">  
                <button type="button" class="btn btn-danger">Cancel</button>
                </a>
            </form>
        </center>
        </div>
    
    </div>
    <br><br>
</div>
@endsection