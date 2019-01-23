@extends('layouts.app')

@section('content')

<div class="container">
    <h3 style="text-align: center">LISTA DE CATEGORIAS</h3>
    
    <div style="text-align: center; ">
        <br>
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" > Añadir </button>
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
                        <a class="btn btn-info" data-toggle="modal" href="editCategoria/{{$categoria->id}}">
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

<div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Listado 2: Peticiones por ciclo.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <div class="form-group">
                  <label for="exampleFormControlSelect1">Grados</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="id_grade">
                    <option value="" selected>Selecciona un grado...</option>
                  </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Filtrar</button>
              </div>
        </div>
      </div>
    </div>
  </div>
  
@endsection
