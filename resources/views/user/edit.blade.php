@extends('layouts.app')

@section('content')
    <div class="container">
            <h3>Editando perfil de {{$users->name}}</h3>
            <br>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><b>SALDO</b></label>
                
                <div class="col-sm-1">
                    <form action="edituser1/{{$users->id}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PUT">
                        <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-plus"></i></button>
                    </form>  
                </div>
                <div class="col-sm-1"><p>{{$users->saldo}}</p></div>
                <div class="col-sm-1">
                    <form action="edituser2/{{$users->id}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PUT">
                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-minus"></i></button>
                    </form>
                </div>
            </div>
            <form method="POST" action="{{url('updateuser')}}/{{$users->id}}">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>NOMBRE</b></label>
                    <div class="col-sm-3">
                        <input type="text"  class="form-control" name="name" value="{{$users->name}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>EMAIL</b></label>
                    <div class="col-sm-3">
                        <input type="text"  class="form-control" name="email" value="{{$users->email}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>ROLE</b></label>
                    <div class="col-sm-3">
                        <input type="text"  class="form-control" name="role" value="{{$users->role}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>LOCALIDAD</b></label>
                    <div class="col-sm-3">
                        <input type="text"  class="form-control" name="localidad" value="{{$users->localidad}}">
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary"> <i class="fas fa-sync-alt"></i> Actualizar</button>
            </form>
            <br>
            <a href="{{action('UserController@perfil', $users->id)}}" class="btn btn-danger"> <i class="fas fa-times"></i> Cancelar</a>
    </div>
@endsection