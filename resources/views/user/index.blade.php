@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <h3 style="text-align: center">LISTA DE USUARIOS</h3>
    @foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg)) 
        {{ Session::get('alert-' . $msg) }} 
    @endif @endforeach
    @if(\Session::has('error'))
    <center><div class="alert alert-danger" role="alert" style="width:50%;"> <center>{!! \Session::get('error') !!} </center></div></center>
    <br>
    @endif
    <br>
    <div style="text-align: center">
        <a href={{ route('showEstados') }}>
            <button class="btn btn-primary mb-4">VER ESTADOS DE CUENTA</button>
        </a>
        <table class="table">
            <thead>
            <tr>
                <td><strong>NOMBRE</strong></td>
                <td><strong>EMAIL</strong></td>
                <td><strong>ROLE</strong></td>
                <td><strong>LOCALIDAD</strong></td>
                <td><strong>SALDO</strong></td>
                <td><strong>ESTADO CUENTA</strong></td>
                <td><strong>FECHA DE CREACIÓN</strong></td>
                <td><strong>ACCIÓN</strong></td>
                <td></td>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->localidad}}</td>
                    <td>{{$user->saldo}} €</td>
                    <td>
                        @if($user->actived == false)
                            Deshabilitada
                        @endif
                        @if($user->actived == true)
                            Habilitada
                        @endif
                    </td>
                    <td>{{$user->created_at->format('Y/m/d')}}</td>
                    <td><a href="{{action('UserController@perfil', $user->id)}}" class="btn btn-success"><i class="far fa-eye"></i></a></td>
                    <td>
                        <form action="deleteuser/{{$user->id}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de eliminar el usuario?')"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection