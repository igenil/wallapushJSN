@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <h3 style="text-align: center">LISTA DE USUARIOS</h3>
    @foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg)) 
        {{ Session::get('alert-' . $msg) }} 
    @endif @endforeach
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
                    {{-- <td>
                        @if($user->actived == true)
                            <form action="listusers/{{$user->id}}" method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="PUT">
                                <button class="btn btn-primary" type="submit">Deshabilitar Cuenta</button>
                            </form>
                        @endif  
                        @if($user->actived == false)
                            <form action="listusers2/{{$user->id}}" method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="PUT">
                                <button class="btn btn-primary" type="submit">Habilitar Cuenta</button>
                            </form>
                        @endif                
                    </td> --}}
                    <td><a href="{{action('UserController@perfil', $user->id)}}" class="btn btn-success"><i class="far fa-eye"></i> Ver Perfil</a></td>
                    <td>
                        <form action="deleteuser/{{$user->id}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de eliminar el usuario?')"><i class="fas fa-trash-alt"></i> Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection