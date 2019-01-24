@extends('layouts.app')
@section('content')

    <div class="container">
        <br>
        <center><h1>CREAR UN ANUNCIO</h1></center>
        <br>
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
            <form method="POST" action="{{url('/addanuncio1')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name" class="col-md-12 control-label">
                        {{ __("Producto") }}
                    </label>
                    <input id="producto" class="form-control" name="producto" style="width:200px" value="{{ old('producto') }}" />
                </div>
                <div class="form-group">
                    <label for="id_categoria">Categoria</label>
                    <select class="form-control" name="id_categoria" style="width:200px" required>
                    <option></option>
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="precio" class="col-md-12 control-label">
                        {{ __("Precio") }}
                    </label>
                    <input id="precio" class="form-control" name="precio" style="width:200px" value="{{ old('precio') }}" />
                </div>
                <div class="form-group">
                    <label for="vendido">Vendido</label>
                    <select class="form-control" name="vendido" style="width:200px" required>
                        <option value="0">No</option>
                        <option value="1">Si</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nuevo">Estado</label>
                    <select class="form-control" name="nuevo" style="width:200px" required>
                        <option value="0">Nuevo</option>
                        <option value="1">Seminuevo</option>
                    </select>
                </div>
                <div class="form-group">
                        <label for="descripcion" class="col-md-12 control-label">
                            {{ __("Descripcion") }}
                        </label>
                        <input id="descripcion" class="form-control" name="descripcion" style="width:200px" value="{{ old('descripcion') }}" />
                </div>
                <button type="submit" name="addanuncio" class="btn btn-success">
                    {{ __("Añadir") }}
                </button>
                &nbsp;&nbsp;&nbsp;
                <a href="{{ url('/listAnuncios') }}">  
                <button type="button" class="btn btn-danger">Cancel</button>
                </a>
            </form>
        </div>
    </div>
    <br><br>
</div>
@endsection