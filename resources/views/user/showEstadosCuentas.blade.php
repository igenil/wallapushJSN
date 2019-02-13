@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4 mb-5" style="text-align:center">ESTADOS DE CUENTAS DE USUARIOS</h1>

    <h5>CUENTAS HABILITADAS</h5>
    <form method="POST" action="{{ route ('deshabilitar') }}">
        {{ csrf_field() }}
        @foreach($users1 as $user)
            <input type="checkbox" class="mb-2" name="arrayUser[]" value="{{$user->id}}">{{$user->name}}</br>
        @endforeach
        <button type="submit" class="btn btn-primary mt-2">DESHABILITAR</button>
    </form>
    <br><br><br>
    <h5>CUENTAS DESHABILITADAS</h5>
    <form method="POST" action="{{ route ('habilitar') }}">
            {{ csrf_field() }}
            @foreach($users2 as $user)
                <input type="checkbox" class="mb-2" name="arrayUser[]" value="{{$user->id}}">{{$user->name}}</br>
            @endforeach
            <button type="submit" class="btn btn-primary mt-2">HABILITAR</button>
        </form>
</div>
@endsection