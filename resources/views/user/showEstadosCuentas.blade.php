@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4 mb-5" style="text-align:center">ESTADOS DE CUENTAS DE USUARIOS</h1>

    <div class="col-md-4 offset-md-4">
    <h5 class="text-center">CUENTAS HABILITADAS</h5>
    <form method="POST" action="{{ route ('deshabilitar') }}">
        {{ csrf_field() }}
        @foreach($users1 as $user)
            <input style="margin-left:23%;" type="checkbox" class="mb-2" name="arrayUser[]" value="{{$user->id}}">{{$user->email}}</br>
        @endforeach
        <button type="submit" class="btn btn-outline-warning mt-2 btn-block">DESHABILITAR</button>
    </form>
    <br><br><br>
    <h5 class="text-center">CUENTAS DESHABILITADAS</h5>
    <form method="POST" action="{{ route ('habilitar') }}">
            {{ csrf_field() }}
            @foreach($users2 as $user)
                <input style="margin-left:23%;" type="checkbox" class="mb-2" name="arrayUser[]" value="{{$user->id}}">{{$user->email}}</br>
            @endforeach
            <button type="submit" class="btn btn-outline-info mt-2 btn-block">HABILITAR</button>
        </form>
    </div>
</div>
@endsection