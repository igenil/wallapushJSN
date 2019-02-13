@extends('layouts.app')

@section('content')
    <div class="container">
        <br><br>  
        <h3>Editando perfil de {{$users->name}}</h3>
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

            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><b>SALDO</b></label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" name="saldo" value="{{$users->saldo}}">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary"> <i class="fas fa-sync-alt"></i> Actualizar</button>
        </form>
        <br>
        <a href="{{action('UserController@perfil', $users->id)}}" class="btn btn-danger"> <i class="fas fa-times"></i> Cancelar</a>
    </div>
@endsection