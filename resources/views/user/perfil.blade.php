@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Perfil de {{$users->name}}</h3>
    <br/>
            <form>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>NOMBRE</b></label>
                    <div class="col-sm-3">
                        <p>{{$users->name}}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>EMAIL</b></label>
                    <div class="col-sm-3">
                        <p>{{$users->email}}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>ROLE</b></label>
                    <div class="col-sm-3">
                        <p>{{$users->role}}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>LOCALIDAD</b></label>
                    <div class="col-sm-3">
                        <p>{{$users->localidad}}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>SALDO</b></label>
                    <div class="col-sm-3">
                        <p>{{$users->saldo}} €</p>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>FECHA DE CREACIÓN</b></label>
                    <div class="col-sm-3">
                        <p>{{$users->created_at->format('Y/m/d')}}</p>
                    </div>
                </div>
            </form>
            <br>
            <a href="{{url('/listusers')}}" class="btn btn-danger"> <i class="fas fa-times"></i> Cancelar</a>
            <a href="{{action('UserController@edit_perfil', $users->id)}}"class="btn btn-warning"><i class="fas fa-pencil-alt"></i> Editar Perfil</a>
        
</div>
@endsection