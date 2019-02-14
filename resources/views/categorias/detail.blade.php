@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <h3 style="text-align: center">LISTA DE CATEGORIAS</h3>
    <div style="text-align: center; ">
        <br>
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" > Añadir </button>
        <br/>
        @if (count($errors)>0)
            <br>
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
        <br>
        <center>
        <table style="width:50%; float:center;" class="table">
            <thead>
            <tr>
                <td><strong>NOMBRE</strong></td>
                <td><strong>ACCIÓN</strong></td>
                <td></td>
            </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>
                    <td>{{$categoria->nombre}}</td>
                    <td>
                    <a class="btn btn-info" style="color:#fff;" data-toggle="modal" data-target="#exampleModal2{{$categoria->id}}">
                        <span class="fas fa-pencil-alt" ></span>
                    </a>
                    @if(!$categorias->isEmpty())
                    <div class="modal fade" id="exampleModal2{{$categoria->id}}"  role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal2Label">Editar una categoria</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <center>
                                    <div role="alert">
                                        <form method="POST" action="{{ route ('editarCategoriaForm', ['id'=> $categoria->id]) }}">
                                            {{ csrf_field() }}
                                            <table>
                                                <tr>
                                                    <td>
                                                        <p>Nombre:</p>
                                                        <input name="nombre" value="{{$categoria->nombre}}"  type="text" class="form-control" required>
                                                        <br>
                                                    </td>
                                                </tr>
                                            </table>
                                            <br>
                                            <br>
                                            <button type="submit" name="addcategoria" class="btn btn-success">{{ __("Editar") }}</button> &nbsp;           
                                            <a href="{{ url('listCategorias/') }}" class="btn btn-danger">Cancelar</a> &nbsp;
                                        </form>
                                        <br>  
                                    </div>
                                </center>
                            </div>
                        </div>
                        </div>
                    </div>
                @endif
                    </td>
                    <td>
                        <form action="deleteCategoria/{{$categoria->id}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de eliminar la categoría?')"><span class="fas fa-trash-alt" ></span></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </center>
    </div>
</div>

<div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir una categoria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        
        <div class="modal-body">            
            <center>
                <div role="alert">                
                    <form method="POST" action="{{ url ('addCategoriaForm') }}">
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
        </div>
      </div>
    </div>
  </div>
@endsection
